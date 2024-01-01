<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<style type="text/css">

</style>


<div class="container" style="width: 500px; height: auto; margin: 0 auto; border: 1px solid #dadada; border-radius: 4px; background: #fbf5ee; overflow: hidden; font-family: system-ui;" >
	<div class="brand" style="width: 100%; display: flex; justify-content: center; background: #464646; padding: 10px 0px;">
		<img style="width:100px; height: auto;" src="{{ asset('images/Logo.webp') }}" alt="Moenul Islam">
	</div>
	<div class="desc" style="padding: 10px;">
		<h2>Hello, {{ $name }}</h2>
		<p>Thanks for your email.</p>
		<hr>
		<p>{!! $desc !!}</p>
		<hr>
		<span style="color: #ce7e08;">Your email was</span>
		<p class="user_mail" style="color:#6a6a6a; background: #ffffff; padding: 10px;">{{ $messages }}</p>
	</div>
	<div class="footer" style="background:#fbf5ee; font-size: 14px; padding: 10px; border-top: 1px solid #e2e2e2; text-align: center;">
		<div class="links" style="justify-content:center; align-items: center;">
			<a href="https://moenul.me" style="padding: 5px;">Visit our website</a>
			<a href="https://moenul.me/login" style="padding: 5px;">Login to you account</a>
			<a href="mailto:support@moenul.me" style="padding: 5px;">Get Support</a>
		</div>
		<div class="copyright" style="color: dimgray; padding: 5px;">
			Copyright © Moenul Islam, All rights reserved.
		</div>
	</div>
</div>

<script type="text/javascript">
	document.styleSheets[0].insertRule("@media only screen and (max-width : 540px) { .container { width: 90% !important;} .links{ display:inline-grid;} }","");
</script>
