@extends('layouts.app')
@section('social_meta')
    @if ($article)
        <meta property="og:url" content="{{url()->current()}}" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="{{$article->title}}" />
        <meta property="og:description" content="{{ $article->tags }}" />
        <meta property="og:image" content="{{ asset('images/Logo.webp') }}" />
    @endif
@endsection
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
        {{-- <div class="article_bar"> --}}
            <article class="article_section">
                @if ($article)
                <header class="article_title skeleton">{{$article->title}}</header>
                <div class="row skeleton">
                    <time class="col-md-4 date"><iconify-icon icon="solar:calendar-date-linear"></iconify-icon> {{ \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}</time>
                    <div class="col-md-4 views"><iconify-icon icon="subway:eye"></iconify-icon> {!! views($article)->count() !!} Views</div>
                    <div class="col-md-4 read_time"><iconify-icon icon="bi:clock"></iconify-icon> {{$article->read_time}}</div>
                </div>
                <div class="article_tags skeleton">
                    <input type="hidden" name="" value="{{ $article->tags }}">
                </div>
                <div class="article_author ">
                    <div class="author_img skeleton"><img src="{{ $article->user->photo ? $article->user->photo->file : '/images/DummyProfile.jpg' }}" alt="{{ $article->user->name }}"></div>
                    <div class="author_desc skeleton">
                        <div class="author_name">{{$article->user->name}}</div>
                        <div class="author_title">
                            @if ($article->user->title == Null)
                                {{"Author"}}
                            @else
                                {{$article->user->title}}
                            @endif
                        </div>
                    </div>
                </div>

                <figure class="article_desc mt-3 skeleton">
                    {!! $article->content !!}
                </figure>


                <footer class="share_section skeleton">
                    <ul>
                        <input value="{{url()->current()}}" id="copyInput" type="hidden">
                        <button id="copyInputBtn">
                            <li>
                                <span class="tooltiptext">Link Copied!</span>
                                <iconify-icon icon="bx:link"></iconify-icon>
                            </li>
                        </button>

                        <a href="https://twitter.com/intent/tweet?url={{url()->current()}}" target="_blank"><li><iconify-icon icon="line-md:twitter-x-alt"></iconify-icon></li></a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&display=popup" target="_blank"><li><iconify-icon icon="gg:facebook"></iconify-icon></li></a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{url()->current()}}" target="_blank"><li><iconify-icon icon="akar-icons:linkedin-fill"></iconify-icon></li></a>
                        <a href="whatsapp://send?text={{url()->current()}}" target="_blank"><li><iconify-icon icon="ri:whatsapp-fill"></iconify-icon></li></a>
                    </ul>
                </footer>

            @endif
            </article>
        {{-- </div> --}}
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

//  Artical tag script
    var array = $('.article_tags input').val().split(", ");

    $.each(array, function(index, value){
        $(".article_tags").append("<a href='/articles?tags=" + value + "'> <iconify-icon icon='mingcute:tag-fill'></iconify-icon> " + value + "</a>");
    });
    // {{ route('articles.index', ['tags'=>" + value + "]) }}
//  Artical tag script

//  Copy to clip box script
    $('#copyInputBtn').on('click', function(e) {
		e.preventDefault();

		/* Get the text field */
		var copyText = document.getElementById("copyInput");

		/* Prevent iOS keyboard from opening */
		copyText.readOnly = true;

		/* Change the input's type to text so its text becomes selectable */
		copyText.type = 'text';

		/* Select the text field */
		copyText.select();
		copyText.setSelectionRange(0, 99999); /* For mobile devices */

		/* Copy the text inside the text field */
		navigator.clipboard.writeText(copyText.value);

		/* Change the input's type back to hidden */
		copyText.type = 'hidden';
	});

    $("#copyInputBtn").click(function() {
        $(".tooltiptext").addClass('tooltiptextActive');

        setTimeout(function() {
            $('.tooltiptext').removeClass('tooltiptextActive');
        }, 500);
    });
//  Copy to clip box script


const allSkeleton = document.querySelectorAll('.skeleton')

window.addEventListener('load', function() {
  allSkeleton.forEach(item=> {
    item.classList.remove('skeleton')
    document.getElementById("skelecton_bg").style.display = 'none';
  })
})

</script>

@endsection
