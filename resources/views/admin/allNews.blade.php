@extends('admin.admin')

@section('allNews')
    <h1>Новости</h1>
    @forelse($news as $item)
        <h2>{{$item->title}}</h2>
        <a href="{{route('deleteNews', $item->id)}}">Удалить</a>
        <a href="{{route('updateNews', $item->id)}}">Редактировать</a>
        <hr>
    @empty
        <p>Нет новостей</p>
    @endforelse
@endsection
