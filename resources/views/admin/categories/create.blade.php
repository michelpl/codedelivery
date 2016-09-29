@extends('app')

@section('content')
    <div class="container">
        <h3>Nova categoria</h3>
        
        
        <p><a href="#" class="btn btn-default">Nova categoria</a></p>
        <br>
        
        {!! $categories->render() !!}
    </div>
    

@endsection