@extends('layouts.app')

@section('title-block')Контакты@endsection

@section('content')

<h1>Страница контактов</h1>

<!--@if($errors->any()) вывод ошибок при заполнении формы клиентом. 
    Изначально этот цикл находился здесь, в contact.blade.php.
    Но пото мы его вынесли в отдельный файл messages.blade.php
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>

@endif-->

<form action="{{route('contact-form')}}" method="post">

    @csrf <!--Всегда добавлять в формы защитный ключ-->

<div class="form-group">
    <label for="name">Имя</label>
    <input type="text" name="name" placeholder="Введите имя" id="name" class="form-control">
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="text" name="email" placeholder="Введите email" id="email" class="form-control">
</div>

<div class="form-group">
    <label for="subject">Тема сообщения</label>
    <input type="text" name="subject" placeholder="Тема сообщения" id="subject" class="form-control">
</div>

<div class="form-group">
    <label for="message">Сообщение</label>
    <textarea name="message" id="message" class="form-control" 
    placeholder="Введите сообщение"></textarea>
</div>

<button type="submit" class="btn btn-success">Отправить</button>
</form>

@endsection
