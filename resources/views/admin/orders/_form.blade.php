@if(!empty($order))
<div class="form-group">
    {!! Form::label('name', 'Cliente')  !!}
    {!! Form::text('client',$order->client->name, ['class' => 'form-control', 'disabled'=>'disabled'])  !!}
</div>
@endif
<div class="form-group">
    {!! Form::label('status', 'Status do pedido')  !!}
    {!! Form::select('status',[1 => 'Ativo', '0'=>'Inativo'],null, ['class' => 'form-control'])  !!}
</div>
<div class="form-group">
    {!! Form::label('user_deliveryman', 'Entregador')  !!}
    {!! Form::select('user_deliveryman',$deliverymen,null, ['class' => 'form-control'])  !!}
</div>