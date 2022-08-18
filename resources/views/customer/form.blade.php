<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('document') }}
            {{ Form::text('document', $customer->document, ['class' => 'form-control' . ($errors->has('document') ? ' is-invalid' : ''), 'placeholder' => 'Document']) }}
            {!! $errors->first('document', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>