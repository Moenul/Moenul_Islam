@extends('layouts.admin')

@section('admin_nav_bar')
    @include('includes.admin_nav_bar')
@endsection

@section('admin_side_nav')
    @include('includes.admin_side_nav')
@endsection



@section('content')
<div class="content_section">
    <!-- start header -->
    <div class="header">
        <h3>Welcome</h3>&nbsp;&nbsp;<span>Sub Heading</span>
        <a href="{{ url('../') }}"><i class="fas fa-home"></i>Home</a>
        <hr>
    </div>
    <!-- end header -->

    <!-- start dashboard content -->

        <a href="{{ route('admin.articals.index') }}">
        <div class="panel post_panel">
            <div class="panel_icon"><i class="fas fa-file-alt"></i></div>
            <div class="panel_content">
                <h5>Total Articals</h5>
                <span>
                @if ($artical_count = App\Models\Artical::count())
                    {{$artical_count}}
                @endif
            </span>
            </div>
        </div>
        </a>

        <a href="">
        <div class="panel user_panel">
            <div class="panel_icon"><i class="fas fa-chart-line"></i></div>
            <div class="panel_content">
                <h5>Total Views</h5>
                <span>
                @if ($total_views = views(App\Models\Artical::class)->count())
                    {{$total_views}}
                @endif
                </span>
            </div>
        </div>
        </a>

        <a href="{{ route('admin.mails.index') }}">
        <div class="panel comment_panel">
            <div class="panel_icon"><i class="fas fa-envelope"></i></div>
            <div class="panel_content">
                <h5>Total Mails</h5>
                <span>
                    @if ($total_mails = App\Models\ContactMail::count())
                        {{$total_mails}}
                    @endif
                </span>
            </div>
        </div>
        </a>

        <a href="">
        <div class="panel category_panel">
            <div class="panel_icon"><i class="far fa-list-alt"></i></div>
            <div class="panel_content">
                <h5>CPU trafic</h5>
                <span>45</span>
            </div>
        </div>
        </a>

    <!-- end dashboard content -->
</div>
@endsection
