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
            <div class="artical_section">
                @if ($artical)
                <h4>{{$artical->title}}</h4>
                <div class="date">{{ \Carbon\Carbon::parse($artical->created_at)->format('d M Y') }}</div>
                <div class="views">Views : {!! views($artical)->count() !!}</div>
                <div class="artical_desc mt-3">
                    {!! $artical->content !!}
                </div>
                <div class="artical_tags">
                    <div class="tags_title">Tags</div>
                    <input type="hidden" name="" value="{{ $artical->tags }}">
                </div>
            @endif
            </div>
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

@section('sctipt')

<script type="text/javascript">

    var array = $('.artical_tags input').val().split(", ");

    $.each(array, function(index, value){
        $(".artical_tags").append("<a href=''>" + value + '</a>');
    });

</script>

@endsection
