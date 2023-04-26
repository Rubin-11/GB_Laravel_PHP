<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css"/>
    <title>Страница авторизации</title>
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
<h1>Авторизация</h1>
<form action="login.php" method="post">
    <label for="login">Логин:</label>
    <input type="text" id="login" name="login"><br><br>
    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password"><br><br>
    <label for="remember">Запомнить меня:</label>
    <input type="checkbox" id="remember" name="remember"><br><br>
    <input type="submit" value="Войти">
</form>
</body>
</html>
