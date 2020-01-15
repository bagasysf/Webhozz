<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    {!! Form::label('user_id', 'User Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('user_id', null, ['class' => ($errors->has('user_id')) ? 'form-control is-invalid' : 'form-control']) !!}

        {!! $errors->first('user_id', '<div class="invalid-feedback d-block">:message</div>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('total') ? 'has-error' : ''}}">
    {!! Form::label('total', 'Total', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('total', null, ['class' => ($errors->has('total')) ? 'form-control is-invalid' : 'form-control']) !!}

        {!! $errors->first('total', '<div class="invalid-feedback d-block">:message</div>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('status', null, ['class' => ($errors->has('status')) ? 'form-control is-invalid' : 'form-control']) !!}

        {!! $errors->first('status', '<div class="invalid-feedback d-block">:message</div>') !!}
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
