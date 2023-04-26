<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css"/>
    <title>Новости</title>
</head>
<nav>
    <ul class="nav_header">
        <li><a href="/">Главная</a></li>
        <li><a href="/about">О проекте</a></li>
        <li><a href="/news">Новости</a></li>
        <li><a href="/authorization_page">Авторизация</a></li>
        <li><a href="/addingNews">Добавить новость</a></li>
    </ul>
</nav>
<body>
<h1>Новости категории {{$categories['name']}}</h1>
<p>Это страница с новостями выбранной категории.</p>

<ul>
    @foreach($result as $item)
        <li>
            <h2><a href="{{ route('news', ['id' => $item['id']]) }}"> {{ $item['title'] }}</a></h2>
            <p>{{ $item['content'] }}</p>
        </li>
    @endforeach
</ul>

</body>
</html>
