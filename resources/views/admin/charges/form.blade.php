<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Title', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('percentage') ? 'has-error' : ''}}">
    {!! Form::label('percentage', 'Percentage', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('percentage', null, ['class' => 'form-control']) !!}
        {!! $errors->first('percentage', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fixed_amount') ? 'has-error' : ''}}">
    {!! Form::label('fixed_amount', 'Fixed Amount', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('fixed_amount', null, ['class' => 'form-control']) !!}
        {!! $errors->first('fixed_amount', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
