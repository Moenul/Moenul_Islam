@extends('layouts.app')

@section('content')


<div class="header_section">
    <div class="container">
        {{-- Nav Bar Include --}}
        @include('includes.nav_bar')
        {{-- Nav Bar Include --}}
    </div>
</div>


<div class="article_page">
	<div class="container">
        <div class="article_bar">
            @if ($articles)
                @foreach ($articles as $article)
                    <div class="article">
                        <div class="date">{{ \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}</div>
                        <div class="article_title">{{$article->title}}</div>
                        <div class="article_content">{!! Str::limit(strip_tags($article->content), 120, ' ...') !!}</div>
                        <div class="article_views"><a href="{{ Route('articles.show', $article->slug) }}" class="see_more">See More </a>
                        <p> <span class="iconify" data-icon="carbon:view-filled"></span>
                            {!! views($article)->count() !!}
                        </p></div>
                    </div>
                @endforeach
                <div class="event_paginate">
                    {!! $articles->links() !!}
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
