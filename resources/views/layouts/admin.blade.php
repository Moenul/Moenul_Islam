<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<title>Admin Pannel</title>

@yield('style')

</head>
<body>


@include('includes.flash-message')


@yield('admin_nav_bar')


<div class="mainSection">


	@yield('admin_side_nav')




    @yield('content')


</div>



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
</script>

@yield('script')

</body>
</html>
