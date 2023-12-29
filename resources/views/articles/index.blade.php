@extends('layouts.app')

@section('content')


{{-- Loadin Animation --}}
<div class="skelecton_bg" id="skelecton_bg">
    <div class="nav_bar skeleton"></div>
</div>
{{-- Loadin Animation --}}

<div class="header_section">
    <div class="container">
        {{-- Nav Bar Include --}}
        @include('includes.nav_bar')
        {{-- Nav Bar Include --}}
    </div>
</div>


<div class="article_page">
	<main class="container">
        <section class="article_bar">
            @if ($articles)
                @foreach ($articles as $article)
                    <article class="article skeleton">
                        <time class="date">{{ \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}</time>
                        <header class="article_title">{{$article->title}}</header>
                        <figure class="article_content">{!! Str::limit(strip_tags($article->content), 120, ' ...') !!}</figure>
                        <div class="article_views"><a href="{{ Route('articles.show', $article->slug) }}" class="see_more">See More </a>
                        <p> <span class="iconify" data-icon="carbon:view-filled"></span>
                            {!! views($article)->count() !!}
                        </p></div>
                    </article>
                @endforeach
                <div class="event_paginate">
                    {!! $articles->links() !!}
                </div>
            @endif
        </section>

        <aside class="quote_bar">
            @if ($quotes)
                @foreach ($quotes as $quote)
                    <div class="quote skeleton">
                        <p>{!! $quote->content !!}</p>
                    </div>
                @endforeach
            @endif
        </aside>

	</main>
</div>



@endsection

@section('footer_content')
    {{-- Footer Content Include --}}
    @include('includes.footer_content')
    {{-- Footer Content Include --}}
@endsection


@section('sctipt')

<script type="text/javascript">

const allSkeleton = document.querySelectorAll('.skeleton')

window.addEventListener('load', function() {
  allSkeleton.forEach(item=> {
    item.classList.remove('skeleton')
    document.getElementById("skelecton_bg").style.display = 'none';
  })
})

</script>

@endsection
