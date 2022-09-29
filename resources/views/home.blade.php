@extends('layouts.app')

@section('title-block')Главная страница@endsection

@section('content')
<h1>Главная страница</h1>
<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
    Quaerat, doloribus placeat dolorem iure tempora repellendus est repellat 
    necessitatibus inventore perferendis rem illo, error accusamus, exercitationem
    dolore minus magni asperiores earum. Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
    Quaerat, doloribus placeat dolorem iure tempora repellendus est repellat 
    necessitatibus inventore perferendis rem illo, error accusamus, exercitationem
     dolore minus magni asperiores earum.</p>
 @endsection

@section('aside')
@parent
<p>Дополнительный текст</p> 
@endsection