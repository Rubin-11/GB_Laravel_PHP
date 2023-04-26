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
<h1>Категории новостей</h1>
<p>Это страница с категориями новостей.</p>

    <ul>
        @foreach($categories as $category)
            <li><a href="{{ route('news_categories', ['id' => $category['id']]) }}">{{ $category['name'] }}</a></li>
        @endforeach
    </ul>

</body>
</html>
