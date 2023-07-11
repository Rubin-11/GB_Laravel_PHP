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
            <form action="{{route($rout, $news->id)}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <select name="category_id" class="form-select" aria-label="Default select example">
                        @forelse($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @empty
                            <p>Нет новостей</p>
                        @endforelse
                    </select>
                </div>
                <div class="input-group mb-3">
                    <select name="source_id" class="form-select" aria-label="Default select example">
                        @forelse($sources as $source)
                            <option value="{{$source->id}}">{{$source->name}}</option>
                        @empty
                            <p>Нет новостей</p>
                        @endforelse
                    </select>
                </div>
                <div class="form-group mb-3">
                    @if($errors->has('title'))
                        <div class="alert alert-danger">
                            @foreach($errors->get('title') as $error)
                                <p style="margin-bottom: 0;">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <input name="title" type="text" class="form-control" placeholder="Название новости"
                           value="{{$news->title}}"
                           aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="form-group mb-3">
                    @if($errors->has('text'))
                        <div class="alert alert-danger">
                            @foreach($errors->get('text') as $error)
                                <p style="margin-bottom: 0;">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <label for="exampleFormControlTextarea1" class="form-label">Текст новости</label>
                    <textarea name="text" class="form-control" id="exampleFormControlTextarea1"
                              rows="3">{{$news->text}}</textarea>
                </div>
                <button class="form-control" type="submit">
                    @if ($news->id)
                        Изменить
                    @else
                        Добавить
                    @endif
                </button>
            </form>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
                crossorigin="anonymous"></script>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</html>
