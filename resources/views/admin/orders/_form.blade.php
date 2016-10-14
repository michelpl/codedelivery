<div class="form-group">
    {!! Form::label('Name', 'Cliente')  !!}
    {!! Form::text('client',$order->client->name, ['class' => 'form-control', 'disabled'=>'disabled'])  !!}
</div>
<div class="form-group">
    {!! Form::label('Status', 'Status do pedido')  !!}
    {!! Form::select('status',[1 => 'Ativo', '0'=>'Inativo'],null, ['class' => 'form-control'])  !!}
</div>