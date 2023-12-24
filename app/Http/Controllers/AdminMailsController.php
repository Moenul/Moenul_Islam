<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMail;
use Mail;

class AdminMailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mails = ContactMail::orderBy('id', 'desc')->paginate(5);
        return view('admin.mails.index', compact('mails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mail_desc = $request->desc;
        $attachment = $request->file('attachment');
        $contact_email = $request->email;
        $contact_subject = $request->subject;
        $contact_message = $request->message;


        // return dd($file);
        $email_data = explode('@', $request->email);
        $name = $email_data[0];


        $data = array( 'name'=> $name, 'email' => $contact_email, 'subject' => $contact_subject, 'messages' => $contact_message, 'desc' => $mail_desc, 'attachment' => $attachment );
        Mail::send('admin/mail', $data, function($message) use ($data){
            $message->to($data['email'], $data['name'])->subject('Reply of - '. $data['subject']);
            if($data['attachment'] !== Null){
                foreach($data['attachment'] as $file){
                    $message->attach($file->getRealPath(), [
                        'as' => $file->getClientOriginalName(),
                        'mime' => $file->getMimeType()
                    ]);
                }
            }
            $message->from('bhuiyansab5@gmail.com' ,'Bijoy Bhuiyan');
        });

        return redirect()->back()->with('success', 'Mail successfully send!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mail = ContactMail::findOrFail($id);

        $mail->update([ 'status' => 1 ]);

        return view('admin.mails.show', compact('mail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mail = ContactMail::findOrFail($id);

        $mail->delete();
        return redirect()->back();
    }
}
