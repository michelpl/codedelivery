@extends('app')

@section('content')
    <div class="container">
        <h3>Clientes</h3>


        <p><a href="{{route('admin.clients.create')}}" class="btn btn-default">Novo cliente</a></p>
        <br>
        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>CEP</th>
            </tr>

            <tbody>

                @foreach($clients as $client)
                    <tr>
                        <td>{{$client->id}}</td>
                        <td>{{$client->user->name}}</td>
                        <td>{{$client->user->email}}</td>
                        <td>{{$client->phone}}</td>
                        <td>{{$client->address}}</td>
                        <td>{{$client->city}}</td>
                        <td>{{$client->state}}</td>
                        <td>{{$client->zipcode}}</td>
                        <td>
                            <a href="{{route('admin.clients.edit',['id' =>$client->id])}}" class="btn btn-primary">Editar</a>
                            <a href="{{route('admin.clients.destroy',['id' =>$client->id])}}" class="btn btn-primary">Excluir</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {!! $clients->render() !!}
    </div>


@endsection
