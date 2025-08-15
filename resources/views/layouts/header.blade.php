<header class="l-header">
    <div class="l-header__logo">
        <a href="{{ route('home') }}"><h1 class="l-header__title">practice-shopping</h1></a>
    </div>
</header>
<div class="c-toast" id="js-toast">
</div>
@if (session('toast'))
<div id="js-toast-message" style="display: none;">{{ session('toast') }}</div>
@endif
