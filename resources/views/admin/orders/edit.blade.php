@extends('app')

@section('content')
    <div class="container">
        <h3>Editando pedido {{$order->id}}</h3>
        
            @include('errors._check')
            {!! Form::model($order,['route' => ['admin.orders.update', $order->id]]) !!}
            @include('admin.orders._form')
            <div class="form-group">
                {!! Form::label('Name', 'Cliente')  !!}
                {!! Form::text('client',$order->client->name, ['class' => 'form-control', 'disabled'=>'disabled'])  !!}
            </div>
            {!! Form::close() !!}
        
    </div>
    <div class="container">
        <h3>Itens do pedido</h3>


        <p><a href="{{route('admin.orders.create')}}" class="btn btn-default">Novo item</a></p>
        <br>
        <pre>

        {{print_r($order->product)}}
        </pre>
        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Preço atual</th>
                <th>Preço no pedido</th>
            </tr>

            <tbody>

            @foreach($order->items as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->product->name}}</td>
                    <td>{{$item->product->category->name}}</td>
                    <td>{{$item->product->price}}</td>
                    <td class="text-right">{{$item->price}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4">Total:</td>
                <td colspan="1" class="active text-right">R$ {{$order->total}}</td>
            </tr>
            </tbody>
        </table>

    </div>
    

@endsection