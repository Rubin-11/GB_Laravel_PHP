<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Главная</title>
</head>
<body>
<x-header></x-header>
<div class="">
    <div class="row container    min-vh-100">
        <x-nav></x-nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <ul class="navbar-nav ms-auto">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <h2>
                        {{ Auth::user()->name }}
                    </h2>
                @endguest
            </ul>
            <h2>Агрегатор новостей</h2>
            <div class="table-responsive">
                <p>Наш агрегатор новостей предоставляет возможность получать актуальную информацию из
                    различных источников в одном месте. Мы собираем новости со всего мира и предоставляем
                    их в удобном формате для наших пользователей.</p>
                <p>С нашим агрегатором вы можете быть уверены, что не пропустите ни одной важной новости.
                    Мы следим за событиями в реальном времени и обновляем информацию на сайте мгновенно.</p>
                <p>Присоединяйтесь к нашему сообществу и будьте в курсе всех событий!</p>
            </div>
        </main>
    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</html>
