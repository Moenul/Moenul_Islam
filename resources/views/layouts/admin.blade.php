<!doctype html>
<html lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<title>Admin Pannel</title>

@yield('style')

</head>
<body>


@include('includes.flash-message')



{{-- Side Nav Section --}}
    @yield('admin_side_nav')
{{-- Side Nav Section --}}

{{-- Content Section --}}
<div class="content_section">

    {{-- Nav Bar --}}
        @yield('admin_nav_bar')
    {{-- Nav Bar --}}

    {{-- Content Bar --}}
        @yield('content')
    {{-- Content Bar --}}

</div>
{{-- Content Section --}}


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/admin.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@ckeditor/ckeditor5-alignment@39.0.2/src/index.min.js"></script>
<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ) ,{
            ckfinder: {
                uploadUrl: "{{route('ckeditor.upload').'?_token='.csrf_token()}}",
            }
        }).catch( error => {
			console.error( error );
		} );

    ClassicEditor
		.create( document.querySelector( '#editor2' ) ,{
            ckfinder: {
                uploadUrl: "{{route('ckeditor.upload').'?_token='.csrf_token()}}",
            }
        }).catch( error => {
			console.error( error );
		} );
</script>

@yield('script')

</body>
</html>
