<nav class="navigation">
	<div class="dropdown_btn"><i class="fas fa-bars"></i></div>

	<div class="nav_bar">
		<li class="nav_item notification"><i class="far fa-bell"><span>0</span></i>
			<div class="dropdown">
				<div class="dropdown_title">Notification</div>
				<a href="">
					<div class="logo_bar"><img src=""></div>
					<div class="detail_bar">
						<div class="date">15 Dec 2023</div>
						<div class="desc">...</div>
					</div>
				</a>
			</div>
		</li>


		<li class="nav_item message"><i class="far fa-envelope">
            <span class="text-warning">
                @if ($mail_count = App\Models\ContactMail::where('status','=',0))
                    {{ $mail_count->count() }}
                @endif
            </span></i>
			<div class="dropdown">
				<div class="dropdown_title">Message</div>
				@if (App\Models\ContactMail::where('status','=',0)->count())
                    @foreach (App\Models\ContactMail::where('status','=',0)->latest()->take(5)->get() as $mail)
                    <a href="{{ Route('admin.mails.show', $mail->id) }}">
                        <div class="logo_bar"><img src="{{ '/images/DummyProfile.jpg' }}"></div>
                        <div class="detail_bar">
                            <div class="desc">{{$mail->subject}}</div>
                            <div class="info">
                                <div class="name">{{$mail->email}}</div>
                                <div class="time">{{$mail->created_at->diffForHumans()}}</div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                @else
                    <a href=""> &nbsp; No message received! </a>
                @endif
			</div>
		</li>

		<li class="nav_item profile"><i class="far fa-profile"> <img src="{{ '/images/DummyProfile.jpg' }}"></i>
			<div class="dropdown">
				<div class="dropdown_title">Profile</div>
				<a href="">Profile</a>
				<a href="{{ route('logout') }}">Log Out</a>
			</div>
		</li>

	</div>


</nav>
