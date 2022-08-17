<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $product->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sale_price') }}
            {{ Form::text('sale_price', $product->sale_price, ['class' => 'form-control' . ($errors->has('sale_price') ? ' is-invalid' : ''), 'placeholder' => 'Sale Price']) }}
            {!! $errors->first('sale_price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('purchase_price') }}
            {{ Form::text('purchase_price', $product->purchase_price, ['class' => 'form-control' . ($errors->has('purchase_price') ? ' is-invalid' : ''), 'placeholder' => 'Purchase Price']) }}
            {!! $errors->first('purchase_price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('expiration_date') }}
            {{ Form::text('expiration_date', $product->expiration_date, ['class' => 'form-control' . ($errors->has('expiration_date') ? ' is-invalid' : ''), 'placeholder' => 'Expiration Date']) }}
            {!! $errors->first('expiration_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('stock') }}
            {{ Form::text('stock', $product->stock, ['class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'Stock']) }}
            {!! $errors->first('stock', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('category_id') }}
            {{ Form::text('category_id', $product->category_id, ['class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => 'Category Id']) }}
            {!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('filing_id') }}
            {{ Form::text('filing_id', $product->filing_id, ['class' => 'form-control' . ($errors->has('filing_id') ? ' is-invalid' : ''), 'placeholder' => 'Filing Id']) }}
            {!! $errors->first('filing_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>