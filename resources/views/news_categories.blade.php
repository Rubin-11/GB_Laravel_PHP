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
            <h2>Категории новостей</h2>
            <div class="table-responsive">
                <p>Это страница с категориями новостей.</p>
                <ul>
                    @foreach($categories as $category)
                        <li>
                            <a href="{{ route('news_categories', ['id' => $category->id]) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
                {{$categories->links()}}
            </div>
        </main>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</html>
