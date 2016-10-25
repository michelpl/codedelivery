@extends('app')

@section('content')
    <div class="container">
        @include('errors._check')
        {!! Form::model($order,['route' => ['admin.orders.update', $order->id]]) !!}


        <h3>Adicionar produto ao pedido {{$order->id}}</h3>


        <br>
    @if(count($products)>0)
        {!! Form::select('name',$products,null, ['class' => 'form-control'])  !!}
    @else
        <p>Nenhum registro encontrado</p>
    @endif
    <div class="form-group">
        {!! Form::submit('Adicionar produto', ['class' => 'btn btn-primary', 'value' => 'Adicionar produto'])  !!}
    </div>
    {!! Form::close() !!}

</div>


@endsection