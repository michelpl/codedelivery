@extends('app')

@section('content')
    <div class="container">
        <h3>Pedidos</h3>
        
        
        <p><a href="{{route('admin.orders.create')}}" class="btn btn-default">Novo pedido</a></p>
        <br>
        <table class="table table-bordered">
            <tr>
                <th>Id</th>
            </tr>
            
            <tbody>

                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>
                            <a href="{{route('admin.orders.edit',['id' =>$order->id])}}" class="btn btn-primary">Editar</a>
                            <a href="{{route('admin.orders.destroy',['id' =>$order->id])}}" class="btn btn-primary">Excluir</a>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        {!! $orders->render() !!}
    </div>
    

@endsection