<div class="form-group {{ $errors->has('transaction_id') ? 'has-error' : ''}}">
    {!! Form::label('transaction_id', 'Transaction Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('transaction_id', null, ['class' => ($errors->has('transaction_id')) ? 'form-control is-invalid' : 'form-control']) !!}

        {!! $errors->first('transaction_id', '<div class="invalid-feedback d-block">:message</div>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('product_id') ? 'has-error' : ''}}">
    {!! Form::label('product_id', 'Product Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('product_id', null, ['class' => ($errors->has('product_id')) ? 'form-control is-invalid' : 'form-control']) !!}

        {!! $errors->first('product_id', '<div class="invalid-feedback d-block">:message</div>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    {!! Form::label('quantity', 'Quantity', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('quantity', null, ['class' => ($errors->has('quantity')) ? 'form-control is-invalid' : 'form-control']) !!}

        {!! $errors->first('quantity', '<div class="invalid-feedback d-block">:message</div>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('sub_total') ? 'has-error' : ''}}">
    {!! Form::label('sub_total', 'Sub Total', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('sub_total', null, ['class' => ($errors->has('sub_total')) ? 'form-control is-invalid' : 'form-control']) !!}

        {!! $errors->first('sub_total', '<div class="invalid-feedback d-block">:message</div>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', [
            'class' => 'btn btn-primary',
            'name' => 'submitButton'
        ]) !!}
    </div>
</div>
