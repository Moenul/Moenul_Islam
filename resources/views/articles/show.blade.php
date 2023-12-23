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
        {{-- <div class="article_bar"> --}}
            <div class="article_section">
                @if ($article)
                <div class="article_title">{{$article->title}}</div>
                <div class="row">
                    <div class="col-md-4 date"><iconify-icon icon="solar:calendar-date-linear"></iconify-icon> {{ \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}</div>
                    <div class="col-md-4 views"><iconify-icon icon="subway:eye"></iconify-icon> {!! views($article)->count() !!} Views</div>
                    <div class="col-md-4 read_time"><iconify-icon icon="bi:clock"></iconify-icon> {{$article->read_time}}</div>
                </div>
                <div class="article_tags">
                    <input type="hidden" name="" value="{{ $article->tags }}">
                </div>
                <div class="article_author">
                    <div class="author_img"><img src="{{ $article->user->photo ? $article->user->photo->file : '/images/DummyProfile.jpg' }}" alt=""></div>
                    <div class="author_desc">
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

                <div class="article_desc mt-3">
                    {!! $article->content !!}
                </div>


                <div class="share_section">
                    <ul>
                        <input value="{{url()->current()}}" id="copyInput" type="hidden">
                        <button id="copyInputBtn">
                            <li>
                                <span class="tooltiptext">Link Copied!</span>
                                <iconify-icon icon="bx:link"></iconify-icon>
                            </li>
                        </button>

                        <a href="https://twitter.com/intent/tweet?url={{url()->current()}}" target="_blank"><li><iconify-icon icon="line-md:twitter-x-alt"></iconify-icon></li></a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}.com&display=popup" target="_blank"><li><iconify-icon icon="gg:facebook"></iconify-icon></li></a>
                        <a href="https://www.linkedin.com/shareArticle?url={{url()->current()}}&title={{$article->title}}" target="_blank"><li><iconify-icon icon="akar-icons:linkedin-fill"></iconify-icon></li></a>
                        <a href="whatsapp://send?text={{url()->current()}}" target="_blank"><li><iconify-icon icon="ri:whatsapp-fill"></iconify-icon></li></a>
                    </ul>
                </div>

            @endif
            </div>
        {{-- </div> --}}
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

</script>

@endsection
