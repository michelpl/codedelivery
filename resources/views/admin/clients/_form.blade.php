<div class="form-group">
    {!! Form::label('name', 'Nome')  !!}
    {!! Form::text('user[name]',$client->user->name, ['class' => 'form-control'])  !!}

</div>
<div class="form-group">
  {!! Form::label('Email', 'E-mail:')  !!}
  {!! Form::email('user[email]',$client->user->email, ['class' => 'form-control'])  !!}

</div>
<div class="form-group">
    {!! Form::label('phone', 'Telefone')  !!}
    {!! Form::text('phone',null, ['class' => 'form-control'])  !!}

</div>
<div class="form-group">
    {!! Form::label('Adress', 'Endereço')  !!}
    {!! Form::text('adress',null, ['class' => 'form-control'])  !!}

</div>
<div class="form-group">
    {!! Form::label('City', 'Cidade')  !!}
    {!! Form::text('city',null, ['class' => 'form-control'])  !!}

</div>
<div class="form-group">
    {!! Form::label('State', 'Estado:')  !!}
    {!! Form::text('state',null, ['class' => 'form-control'])  !!}

</div>
<div class="form-group">
    {!! Form::label('Zipcode', 'CEP:')  !!}
    {!! Form::text('zipcode',null, ['class' => 'form-control'])  !!}

</div>
