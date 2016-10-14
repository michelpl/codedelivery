@extends('app')

@section('content')
    <div class="container">
        <h3>Novo pedido</h3>
        
            @include('errors._check')
            
            {!! Form::open(['route' => 'admin.orders.store']) !!}
            @include('admin.orders._form')
            <div class="form-group">
                    {!! Form::submit('Salvar', ['class' => 'btn btn-primary', 'value' => 'Salvar'])  !!}
            </div>
            {!! Form::close() !!}
        
    </div>
@endsection