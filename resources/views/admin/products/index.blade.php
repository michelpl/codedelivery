@extends('app')

@section('content')
    <div class="container">
        <h3>Produtos</h3>
        
        
        <p><a href="{{route('admin.products.create')}}" class="btn btn-default">Novo produto</a></p>
        <br>
        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Produto</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th>Ação</th>
            </tr>
            
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>
                            <a href="{{route('admin.products.edit',['id' =>$product->id])}}" class="btn btn-primary">Editar</a>
                            <a href="{{route('admin.products.destroy',['id' =>$product->id])}}" class="btn btn-primary">Excluir</a>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        {!! $products->render() !!}
    </div>
    

@endsection