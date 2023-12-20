<div class="nav_bar">
    <div class="nav_button">
        <div class="button_bar button_bar_1"></div>
        <div class="button_bar button_bar_2"></div>
    </div>
    <div class="nav_list">
        <ul>
            <a href="{{ url('/') }}"><li><iconify-icon icon="iconoir:home"></iconify-icon> <span>Home</span></li></a>
            <a href="{{ url('/#gallary') }}"><li><iconify-icon icon="solar:camera-broken"></iconify-icon> <span>Gallary</span></li></a>
            <a href="{{ url('/articals') }}"><li><iconify-icon icon="circum:pen" rotate="270deg"></iconify-icon> <span>Articals</span></li></a>
            <a href="{{ url('pdfs/Moenul_Islam_Resume.pdf') }}"><li><iconify-icon icon="solar:notes-broken"></iconify-icon> <span>Resume</span></li></a>
            <a href="{{ url('/#contact') }}"><li><iconify-icon icon="solar:call-chat-outline"></iconify-icon> <span>Say hello?</span></li></a>
            <a href="{{ url('/login') }}"><li> <div class="subscribe">Subscribe</div></li></a>
        </ul>
    </div>
    <div class="nav_brand"><a href="{{ url('/') }}">
        <img class="desktop" style="width:100%" src="{{ asset('images/Logo.webp') }}" alt="Moenul Islam Logo">
        <img class="phone" style="width:100%" src="{{ asset('images/LogoWhite.webp') }}" alt="Moenul Islam Logo">
    </a></div>
</div>
