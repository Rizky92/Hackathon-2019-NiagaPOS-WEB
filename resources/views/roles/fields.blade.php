<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', 'Name',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Display Name Field -->
<div class="form-group row">
    {!! Form::label('display_name', 'Display Name',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Description Field -->
<div class="form-group row">
    {!! Form::label('description', 'Description',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('description', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-actions">
    <a href="roles.index" class="btn btn-danger">
        <i class="ft-x"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="fa fa-check-square-o"></i> Save
    </button>
</div>
