<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css"/>
    <title>Страница добавления новости</title>
</head>
<body>
<nav>
    <ul class="nav_header">
        <li><a href="/">Главная</a></li>
        <li><a href="/about">О проекте</a></li>
        <li><a href="/news">Новости</a></li>
        <li><a href="/authorization_page">Авторизация</a></li>
        <li><a href="/addingNews">Добавить новость</a></li>
    </ul>
</nav>
<h1>Добавление новости</h1>
<form>
    <label for="title">Заголовок новости:</label><br>
    <input type="text" id="title" name="title"><br>
    <label for="description">Подробное описание новости:</label><br>
    <textarea id="description" name="description"></textarea><br>
    <label for="summary">Краткое описание новости:</label><br>
    <textarea id="summary" name="summary"></textarea><br>
    <input type="submit" value="Добавить новость">
</form>
</body>
</html>
