@extends('app')

@section('content')
    <div class="container">
        <h3>Editando categoria {{$category->name}}</h3>
        
            @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
            {!! Form::model($category,['route' => ['admin.categories.update', $category->id]]) !!}
            <div class="form-group">
                    {!! Form::label('name', 'Nome')  !!}
                    {!! Form::text('name',null, ['class' => 'form-control'])  !!}
                    
            </div>
            <div class="form-group">
                    {!! Form::submit('Salvar', ['class' => 'btn btn-primary', 'value' => 'Salvar'])  !!}
            </div>
            {!! Form::close() !!}
        
    </div>
    

@endsection