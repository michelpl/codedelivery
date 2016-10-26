@extends('app')

@section('content')
    <div class="container">

        {!! Form::model($order,['route' => ['admin.orderItems.store']]) !!}
            <h3>Adicionar produto ao pedido {{$order->id}}</h3>
            <br>
            @if(count($products)>0)
                <div class="form-group">
                    {!! Form::select('product_id',$products,null, ['class' => 'form-control'])  !!}
                    {!! Form::hidden('order_id',$order->id) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Adicionar produto', ['class' => 'btn btn-primary', 'value' => 'Adicionar produto'])  !!}
                </div>
            @else
                <p>Nenhum registro encontrado</p>
            @endif
        {!! Form::close() !!}

    </div>


@endsection