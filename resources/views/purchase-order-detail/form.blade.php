<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('purchase_order_id') }}
            {{ Form::text('purchase_order_id', $purchaseOrderDetail->purchase_order_id, ['class' => 'form-control' . ($errors->has('purchase_order_id') ? ' is-invalid' : ''), 'placeholder' => 'Purchase Order Id']) }}
            {!! $errors->first('purchase_order_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('product_id') }}
            {{ Form::text('product_id', $purchaseOrderDetail->product_id, ['class' => 'form-control' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => 'Product Id']) }}
            {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('quantity') }}
            {{ Form::text('quantity', $purchaseOrderDetail->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity']) }}
            {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('price') }}
            {{ Form::text('price', $purchaseOrderDetail->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price']) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
