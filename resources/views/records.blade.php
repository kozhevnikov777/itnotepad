@extends('layout')
@section('title')Записи@endsection
@section('main_content')
    <h1>Форма добавления записи</h1>
    <form method="post" action="/records/check">
        @csrf
        <input type="email" name="email" id="email" placeholder="Введите email" class="form-control"><br>
        <input type="text" name="record_name" id="record_name" placeholder="Название" class="form-control"><br>
        <textarea name="record_text" id="record_text" placeholder="Новая запись" class="form-control"></textarea><br>
        <button type="submit" class="btn btn-success">Добавить</button>
    </form>
    <br>
    <h1>Все записи</h1>
    @foreach($notes as $el)
        <div class="alert alert-warning">
            <h3>{{$el->record_name}}</h3>
            <b>{{$el->email}}</b>
            <p>{{$el->record_text}}</p>
        </div>
    @endforeach


@endsection
