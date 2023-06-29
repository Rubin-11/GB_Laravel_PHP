@extends('welcome')

@section('allNews')
{{--    <h1>Новости</h1>--}}
{{--    <p><a href="{{route('addNews')}}">Добавление новости</a></p>--}}
    @forelse($news as $item)
        <h2>{{$item->title}}</h2>
        <a href="{{route('deleteNews', $item->id)}}">Удалить</a>
        <a href="{{route('updateNews', $item->id)}}">Редактировать</a>
        <hr>
    @empty
        <p>Нет новостей</p>
    @endforelse
{{--        {{$news->links()}}--}}
@endsection
