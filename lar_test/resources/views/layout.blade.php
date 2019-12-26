<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cover.css') }}">
    <script src="{{ asset("js/jquery-3.4.1.min.js") }}"></script>
    <script src="{{ asset("js/popper.min.js") }}}"></script>
    <script src="{{ asset("js/bootstrap.min.js") }}"></script>
    <title>
        @yield("app-title", "Перегляд персонажів")
    </title>
</head>
<body class="text-center">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">@yield("app-title")</h3>
            <nav class="nav nav-masthead justify-content-end">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <a class="nav-link" href="{{ route('login') }}">Увійти</a>
                    <a class="nav-link" href="{{ route('register') }}">Зареєструватися</a>
                @else
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                Вийти
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                        @endif
            </nav>
            <nav class="nav nav-masthead justify-content-center" style="margin: 25px;">
                <a class="nav-link" href="/">Головна</a>
                <a class="nav-link" href="/groups">Персонажі</a>
                <a class="nav-link" href="/group/0/students">Гравці</a>
                {{-- @can('admin-panel')
                    <a class="nav-link" href="/admin">Адмін-панель</a>
                @endcan --}}
                <a class="nav-link" href="/about">Про проект</a>
            </nav>
        </div>
    </header>
    <main role="main" class="inner cover">
        <h1 class="cover-heading">@yield('page-title')</h1>
        @yield("page-content")
    </main>

    <footer class="mastfoot mt-auto">
        <div class="inner">
            @yield('page-footer')
        </div>
    </footer>
</div>
</body>
</html>
