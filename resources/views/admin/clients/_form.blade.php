<div class="form-group">
    {!! Form::label('name', 'Nome')  !!}
    {!! Form::text('name',null, ['class' => 'form-control'])  !!}

</div>
<div class="form-group">
    {!! Form::label('Password', 'Senha')  !!}
    {!! Form::password('password',null, ['class' => 'form-control'])  !!}

</div>
<div class="form-group">
    {!! Form::label('Email', 'E-mail:')  !!}
    {!! Form::email('email',null, ['class' => 'form-control'])  !!}

</div>
