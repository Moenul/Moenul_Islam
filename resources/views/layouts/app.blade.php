<!doctype html>
<html lang="en" style="scroll-behavior: smooth; overflow-x: scroll;">
<head>
    <meta charset="utf-8" name="description" content="Author: Moenul Islam, Work: Full Stack Web Developer | UI/UX Web Designer, Passion: Artical Writer, Skill : Web Design, Backend Develop, SEO, HTML, CSS, Js, Javascript, Ajax, Laravel, PHP, MySql">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="pk1JeTarEp88R5A0B9Pyc5cpU9Fj1sNcHluWCGMXyvA" />

    @yield('social_meta')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href=" {{ asset('css/bootstrap.min.css') }} ">
	<link rel="stylesheet" href=" {{ asset('css/main.css') }} ">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WG6MBBDH');</script>
<!-- End Google Tag Manager -->


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-7FSJSEMWCZ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-7FSJSEMWCZ');
</script>
<!-- Google tag (gtag.js) -->



<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/658aede107843602b805a93b/1hijb2f09';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->


    @yield('style')

<title>Moenul Islam</title>
	<link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
</head>
<body>


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WG6MBBDH"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!--  Custom Cursor -->

<div class="cursor"></div>
<div class="cursor2"></div>

<!--  Custom Cursor -->

{{-- Flash Message --}}
@include('includes.flash-message')
{{-- Flash Message --}}

@yield('content')


<div class="footer">
	<div class="container">
		<div class="scroll_to_top" onclick="topFunction()" id="myBtn">
			<span class="iconify" data-icon="icon-park-outline:to-top"></span>
		</div>

		@yield('footer_content')

		<div class="right_manager">
			&copy; All Rights Reserved
		</div>
	</div>
</div>
<!-- end footer -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->


<script src=" {{ asset('js/scripts.js') }} "></script>

<script src=" {{ asset('js/jquery-3.4.1.min.js') }} "></script>
<script src=" {{ asset('js/bootstrap.min.js') }} "></script>

<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

<script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>

<!-- Setup and start animation! -->
<script type="text/javascript">

// --------- Custom Cursor ------------------

// UPDATE: I was able to get this working again... Enjoy!

var cursor = document.querySelector('.cursor');
var cursorinner = document.querySelector('.cursor2');
var a = document.querySelectorAll('a');

document.addEventListener('mousemove', function(e){
  var x = e.clientX;
  var y = e.clientY;
  cursor.style.transform = `translate3d(calc(${e.clientX}px - 50%), calc(${e.clientY}px - 50%), 0)`
});

document.addEventListener('mousemove', function(e){
  var x = e.clientX;
  var y = e.clientY;
  cursorinner.style.left = x + 'px';
  cursorinner.style.top = y + 'px';
});

document.addEventListener('mousedown', function(){
  cursor.classList.add('click');
  cursorinner.classList.add('cursorinnerhover')
});

document.addEventListener('mouseup', function(){
  cursor.classList.remove('click')
  cursorinner.classList.remove('cursorinnerhover')
});

a.forEach(item => {
  item.addEventListener('mouseover', () => {
    cursor.classList.add('hover');
  });
  item.addEventListener('mouseleave', () => {
    cursor.classList.remove('hover');
  });
})

// --------- Custom Cursor ------------------

</script>

@yield('sctipt')

</body>
</html>
