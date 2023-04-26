<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css"/>
        <title>Главная</title>
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
    <body class="">
    <h1>Агрегатор новостей</h1>
    <p>Наш агрегатор новостей предоставляет возможность получать актуальную информацию из
        различных источников в одном месте. Мы собираем новости со всего мира и предоставляем
        их в удобном формате для наших пользователей.</p>
    <p>С нашим агрегатором вы можете быть уверены, что не пропустите ни одной важной новости.
        Мы следим за событиями в реальном времени и обновляем информацию на сайте мгновенно.</p>
    <p>Присоединяйтесь к нашему сообществу и будьте в курсе всех событий!</p>
    </body>
</html>
