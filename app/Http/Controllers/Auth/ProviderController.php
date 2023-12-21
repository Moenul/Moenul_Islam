<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Auth;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {

            $socialUser = Socialite::driver($provider)->user();

            if(User::where(['email' => $socialUser->getEmail(), 'provider' => Null ])->orWhere('provider', '!=', $provider )->exists()){
                return redirect('/login')->with(['error'=> 'This email use different method to login']);
            }

            $user = User::where([
                'email' => $socialUser->email,
                'provider' => $provider,
                'provider_id' => $socialUser->id,
            ])->first();

            if(!$user){
                $user = User::updateOrCreate([
                    'provider_id' => $socialUser->id,
                    'provider' => $provider,
                ], [
                    'name' => $socialUser->name,
                    'email' => $socialUser->email,
                    'provider_token' => $socialUser->token,
                    'email_verified_at' => now(),
                ]);

                Auth::login($user);
            return redirect('/');
            }else{
                Auth::login($user);
            return redirect('/');
            }


        } catch (Exception $e) {

            return redirect('/login')->with(['error'=> 'Something went wrong!']);

        }

    }
}
