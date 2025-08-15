<header class="l-header">
    <div class="l-header__logo">
        <a href="{{ route('home') }}"><h1 class="l-header__title">practice-shopping</h1></a>
    </div>
    <div class="c-toast" id="js-toast">
        @if (session('toast'))
        <div class="c-toast__message js-tastMessage">{{ session('toast') }}</div>
        @endif
    </div>
</header>
