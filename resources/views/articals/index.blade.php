@extends('layouts.app')

@section('content')


<div class="header_section">
    <div class="container">
        {{-- Nav Bar Include --}}
        @include('includes.nav_bar')
        {{-- Nav Bar Include --}}
    </div>
</div>


<div class="artical_page">
	<div class="container">
        <div class="artical_bar">
            @if ($articals)
                @foreach ($articals as $artical)
                    <div class="artical">
                        <div class="date">{{ \Carbon\Carbon::parse($artical->created_at)->format('d M Y') }}</div>
                        <div class="artical_content">{!! Str::limit(strip_tags($artical->content), 200, ' ...') !!}</div>
                        <div class="artical_views"><a href="{{ Route('articals.show', $artical->slug) }}" class="see_more">See More </a>
                        <p> <span class="iconify" data-icon="carbon:view-filled"></span>
                            {!! views($artical)->count() !!}
                        </p></div>
                    </div>
                @endforeach
                <div class="event_paginate">
                    {!! $articals->links() !!}
                </div>
            @endif
        </div>

        <div class="quote_bar">
            @if ($quotes)
                @foreach ($quotes as $quote)
                    <div class="quote">
                        <p>{!! $quote->content !!}</p>
                    </div>
                @endforeach
            @endif
        </div>

	</div>
</div>



@endsection

@section('footer_content')
    {{-- Footer Content Include --}}
    @include('includes.footer_content')
    {{-- Footer Content Include --}}
@endsection
