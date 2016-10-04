@extends('app')

@section('content')
    <div class="container">
        <h3>Categorias</h3>
        
        
        <p><a href="{{route('admin.categories.create')}}" class="btn btn-default">Nova categoria</a></p>
        <br>
        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Ação</th>
            </tr>
            
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td><a href="{{route('admin.categories.edit',['id' =>$category->id])}}" class="btn btn-primary">Editar</a></td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        {!! $categories->render() !!}
    </div>
    

@endsection