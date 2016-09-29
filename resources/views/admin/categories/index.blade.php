@extends('app')

@section('content')

    <h1>Categorias.</h1>
    <h2>{{$nome}}</h2>
    
    <ul>
        @foreach($linguagens as $linguagem)
            <li>{{$linguagem}}</li>
        @endforeach
    </ul>

@endsection