<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('filing') }}
            {{ Form::text('filing', $filing->filing, ['class' => 'form-control' . ($errors->has('filing') ? ' is-invalid' : ''), 'placeholder' => 'Filing']) }}
            {!! $errors->first('filing', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>