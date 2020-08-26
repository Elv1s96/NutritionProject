<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
        @guest
               <a class="btn btn-outline-primary" href="{{ route('login') }}">Войти</a>
               <a style="margin-left:10px;" class="btn btn-outline-primary" href="{{ route('register') }}">Зарегистрироваться</a>
            @endguest
        @auth
        <li class="nav-item dropdown" style="list-style-type: none;">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('fitness.index') }}">Мой профиль</a>
                <a class="dropdown-item" href="{{ route('product.index') }}">Список продуктов</a>
                <a class="dropdown-item" href="{{ route('nutrition.index') }}">Мое питание</a>
                <div class="dropdown-divider"></div>
                <a style="margin-left:10px;" class="dropdown-item" href="{{ route('get-logout') }}">Выйти</a>
            </div>
        </li>
        @endauth
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

{{--<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">--}}
{{--    <h5 class="my-0 mr-md-auto font-weight-normal"><a href="{{route('home')}}">Egor`s Site</a></h5>--}}
{{--    <nav class="my-2 my-md-0 mr-md-3">--}}
{{--        <a class="p-2 text-dark" href="#">Banner</a>--}}
{{--        <a class="p-2 text-dark" href="#">Отпарвить емеил</a>--}}
{{--        <a class="p-2 text-dark" href="#">Альбом</a>--}}
{{--        <a class="p-2 text-dark" href="#">Категории</a>--}}
{{--    </nav>--}}
{{--    @guest--}}
{{--        <a class="btn btn-outline-primary" href="{{ route('login') }}">Войти</a>--}}
{{--        <a style="margin-left:10px;" class="btn btn-outline-primary" href="{{ route('register') }}">Зарегистрироваться</a>--}}
{{--    @endguest--}}
{{--    @auth--}}
{{--        <li class="nav-item dropdown">--}}
{{--            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                {{ Auth::user()->name }}--}}
{{--            </a>--}}
{{--            <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                <a class="dropdown-item" href="#">Мой профиль</a>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <a style="margin-left:10px;" class="btn btn-outline-primary" href="{{ route('get-logout') }}">Выйти</a>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        {{ Auth::user()->name }}--}}
{{--        <a style="margin-left:10px;" class="btn btn-outline-primary" href="{{ route('get-logout') }}">Выйти</a>--}}
{{--    @endauth--}}
{{--</div>--}}
