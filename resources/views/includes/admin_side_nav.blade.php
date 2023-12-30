<div class="side_nav">
	<div class="ProfileSection">
		<div class="brand">
			<img class="big_image" src="{{ asset('images/logo_cover.png') }}" alt="">
			<img class="small_image" src="{{ asset('images/Logo.webp') }}" alt="">
		</div>
		<div class="profileImg"><img src="{{ Auth::user()->photo ? Auth::user()->photo->file : '/images/DummyProfile.jpg' }}" alt=""></div>
		<div class="profileDesc">
			<div class="name">{{Auth::user()->name}}</div>
			<div class="title">
                @if (Auth::user()->title == Null)
                    {{"Author"}}
                @else
                    {{Auth::user()->title}}
                @endif
            </div>
		</div>

	</div>

	<a href="/admin"><li class="side_nav_item"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></li></a>

	<li class="side_nav_item"><i class="far fa-clipboard"></i><span>Articles</span>
        <div class="side_dropdown_nav"><i class="fas fa-angle-down"></i></div>
        <div class="side_dropdown">
            <a href="{{ route('admin.mgArticles.index') }}">View Articles</a>
            <a href="{{ route('admin.mgArticles.create') }}">Create Article</a>
        </div>
    </li>

    <a href="{{ route('admin.quotes.index') }}"><li class="side_nav_item"><i class="fas fa-quote-left"></i><span>Quote</span></li></a>

    <a href="{{ route('admin.galleries.index') }}"><li class="side_nav_item"><i class="fas fa-image"></i><span>Gallery</span></li></a>

    <li class="side_nav_item"><i class="fas fa-puzzle-piece"></i><span>Widget</span>
        <div class="side_dropdown_nav"><i class="fas fa-angle-down"></i></div>
        <div class="side_dropdown">
            <a href="{{ route('admin.categories.index') }}">Category</a>
            <a href="{{ route('admin.services.index') }}">Service</a>
            <a href="{{ route('admin.socials.index') }}">Social</a>
        </div>
    </li>

    <a href="{{ route('admin.mails.index') }}"><li class="side_nav_item"><i class="fas fa-envelope"></i><span>Mailbox</span></li></a>


    <a href="{{ route('admin.profile.index') }}"><li class="side_nav_item"><i class="fas fa-user"></i><span>Profile</span></li></a>


    {{-- <a href="{{ route('admin.services.index') }}"><li class="side_nav_item"><i class="fas fa-toolbox"></i><span>Service</span></li></a>
    <a href="{{ route('admin.categories.index') }}"><li class="side_nav_item"><i class="fas fa-shapes"></i><span>Category</span></li></a>
    <a href="{{ route('admin.socials.index') }}"><li class="side_nav_item"><i class="fas fa-share-alt"></i><span>Social</span></li></a> --}}

    {{-- <a href=""><li class="side_nav_item"><i class="far fa-bell"></i><span>Notification</span></li></a> --}}
    {{-- <a href=""><li class="side_nav_item"><i class="fas fa-puzzle-piece"></i><span>Widget</span></li></a> --}}



</div>
