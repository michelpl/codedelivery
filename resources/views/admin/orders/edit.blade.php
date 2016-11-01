@extends('app')

@section('content')
    <div class="container">
        <h3>Editando pedido {{$order->id}}</h3>

        @include('errors._check')
        {!! Form::model($order,['route' => ['admin.orders.update', $order->id]]) !!}
        @include('admin.orders._form')


        <h3>Itens do pedido</h3>


        <p><a href="{{route('admin.orderItems.create',['id' => $order->id])}}" class="btn btn-default">Novo item</a></p>
        <br>
    @if(count($order->items)>0)
        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Quantidade</th>
                <th>Preço no pedido</th>
                <th>Subtotal</th>
            </tr>

            <tbody>

            @foreach($order->items as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->product->name}}</td>
                    <td>{{$item->product->category->name}}</td>
                    <td>{{$item->qtd}}</td>
                    <td class="text-right">{{$item->price}}</td>
                    <td>{{money_format('%.2n', ($item->price * $item->qtd))}}</td>
                    <td class="text-right"><a href="{{route('admin.orderItems.destroy',['id' =>$item->id])}}">Remover</a></td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5">Total:</td>
                <td colspan="1" class="active text-right">R$ {{$order->total}}</td>
            </tr>
            </tbody>
        </table>
    @else
        <p>Nenhum item encontrado</p>
    @endif
    <div class="form-group">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary', 'value' => 'Salvar'])  !!}
    </div>
    {!! Form::close() !!}

</div>


@endsection