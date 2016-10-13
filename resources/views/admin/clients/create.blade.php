@extends('app')

@section('content')
    <div class="container">
        <h3>Novo cliente</h3>
        
            @include('errors._check')
            
            {!! Form::open(['route' => 'admin.clients.store']) !!}
            @include('admin.clients._form')
            <div class="form-group">
                    {!! Form::submit('Salvar', ['class' => 'btn btn-primary', 'value' => 'Salvar'])  !!}
            </div>
            {!! Form::close() !!}
        
    </div>
    

@endsection