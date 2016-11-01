@extends('app')

@section('content')
    <div class="container">
        <h3>Pedidos</h3>
        <br>
        @if(!empty($orders))
        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Cliente</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
            
            <tbody>

                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->client->name}}</td>
                        <td>{{$status[$order->status]}}</td>
                        <td>
                            <a href="{{route('admin.orders.edit',['id' =>$order->id])}}" class="btn btn-primary">Editar</a>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        @else
            <h3>Nenhum pedido encontrado</h3>
        @endif
        {!! $orders->render() !!}
    </div>
    

@endsection