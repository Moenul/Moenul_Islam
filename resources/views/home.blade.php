@extends('layouts.app')

@section('content')


<div class="header_section">
    <div class="container">

        {{-- Nav Bar Include --}}
        @include('includes.nav_bar')
        {{-- Nav Bar Include --}}

        <div class="into_bar">
            <span class="first_bg_style">Hi</span>
            <span class="display_name">I'm MOENUL ISLAM</span>

            <span class="second_bg_style">;</span>

            <span class="animate_title">Full-Stack</span>
            <div class="animate_section">
                <span>WEB <span class="animate_text auto-type"></span></span>
            </div>

            <div class="display_image_section">
                <div class="bg_image">
                    <img src="{{ asset('images/Cover_Photo.webp') }}" alt="Moenul Islam, Cover Photo">
                </div>
            </div>
        </div>

    </div>
</div>

<div class="service_section">
    <div class="container">
        @if ($services)
            @foreach ($services as $service)
            <div class="service_bar">
                <div class="logo_section">
                    <div class="logo_bar">
                        <span class="iconify" data-icon="{{$service->service_icon}}"></span>
                    </div>
                </div>
                <div class="name_section">{{$service->service_name}}</div>
                <div class="desc_section"><p>{{$service->service_desc}}</p></div>
                <div class="cool_title">{{$service->service_title}}</div>
                <div class="cool_desc">{{$service->service_type}}</div>
                <div class="skill_title">{{$service->service_component_title}}</div>
                <div class="skill_desc">
                    {!! $service->service_components !!}
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>

<div class="gallary_section" id="gallary">
    <div class="container">
        <div class="main_title">My Recent Work</div>
        <div class="sub_title">Here are a few post of projects I've worked on.</div>

        <div class="gallary">
            @if ($galleries)
                @foreach ($galleries as $gallery)
                <div class="gallary_item">
                    <img src="{{ $gallery->photo ? $gallery->photo->file : '/images/Empty_Images.jpg' }}" alt="{{$gallery->desc}}">
                    <div class="gallary_item_hover">
                        <div class="item_desc">{{$gallery->desc}}</div>
                        <a href="{{$gallery->link}}"><div class="item_button">Visit Website</div></a>
                    </div>
                </div>
                @endforeach
            @endif
        </div>

    </div>
</div>



<div class="artical_section">
    <div class="container">
        <div class="style_bar">
            <div class="style_box">
                <div class="span span_1">I Write,</div>
                <div class="span span_2">Sometimes</div>
                <div class="design">
                    <img src="{{ asset('images/star.png') }}" alt="Artical Idea Star">
                </div>
            </div>
        </div>
        <div class="button_bar">
            <div class="button_title"><p>
                I write about my feelings, thought, social issues, design, frontend dev, learning and life.
            </p></div>
            <a href="{{ url('/articals') }}"><div class="button">Read my Articles <span class="iconify" data-icon="cil:arrow-right"></span></div></a>
        </div>
    </div>
</div>



<div class="contact_section" id="contact">
    <div class="container">
        <div class="main_title">Say hello?</div>
        <div class="sub_title">You can touch on me by a email or those social sites</div>

        <div class="contact_bar">
            <div class="mail_section">
                {!! Form::open(['method'=>'POST', 'action'=>'ContactMailsController@store', 'files'=>true]) !!}
                    @csrf
                    <div class="form-group">
                        {!! Form::textarea('message', null, ['class'=>'form-control','rows'=>4, 'placeholder'=>'Write Here ...']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::text('subject', null, ['class'=>'form-control', 'placeholder'=>'Subject']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'example@mail.com', 'required'=>'required']) !!}
                    </div>

                        {!! Form::submit('Send', ['class'=>'btn']) !!}

                {!! Form::close() !!}
            </div>
            <div class="social_section">
                <div class="social_bar">
                    @if ($socials)
                        @foreach ($socials as $social)
                        <a href="{{$social->social_link}}"><div class="social_iteml" style="color:{{$social->icon_color}};">
                            <span class="iconify" data-icon="{{$social->social_icon}}"></span>
                        </div></a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>


@endsection

@section('footer_content')
    {{-- Footer Content Include --}}
    @include('includes.footer_content')
    {{-- Footer Content Include --}}
@endsection

@section('sctipt')

<script type="text/javascript">

var typed = new Typed('.auto-type', {
	strings: ['DESIGNER', 'DEVELOPER'],
	typeSpeed: 200,
	backSpeed: 200,
	backDelay: 1000,
	cursorChar: "_",
	loop: true
});

</script>

@endsection
