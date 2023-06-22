@extends('welcome')

@section('addNews')
    <h1>{{$news->name}}</h1>
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
        <input name="title" type="text" class="form-control" placeholder="Название новости" value="{{$news->title}}"
               aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="mb-3">
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
@endsection

