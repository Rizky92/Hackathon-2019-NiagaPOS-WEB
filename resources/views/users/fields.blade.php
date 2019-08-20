<div class="form-group row">
    {!! Form::label('', 'Site',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::Select('site_id',$sites, null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('', 'Name',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('', 'Email',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('', 'Kontak',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('kontak', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('', 'Password',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::password('password', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('foto', 'Foto',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::file('foto', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-actions">
    <a href="{!! route('users.index') !!}" class="btn btn-danger">
        <i class="ft-x"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="fa fa-check-square-o"></i> Save
    </button>
</div>
