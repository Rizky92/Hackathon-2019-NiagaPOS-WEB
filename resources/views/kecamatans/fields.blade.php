<!-- Nama Field -->
<div class="form-group row">
    {!! Form::label('nama', 'Nama',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Telepon Field -->
<div class="form-group row">
    {!! Form::label('telepon', 'Telepon',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('telepon', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Email Field -->
<div class="form-group row">
    {!! Form::label('email', 'Email',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Alamat Field -->
<div class="form-group row">
    {!! Form::label('alamat', 'Alamat',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Fax Field -->
<div class="form-group row">
    {!! Form::label('fax', 'Fax',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('fax', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Latitude Field -->
<div class="form-group row">
    {!! Form::label('latitude', 'Latitude',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('latitude', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Longitude Field -->
<div class="form-group row">
    {!! Form::label('longitude', 'Longitude',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('longitude', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Camat Field -->
<div class="form-group row">
    {!! Form::label('camat', 'Camat',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('camat', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Cover Field -->
<div class="form-group row">
    {!! Form::label('cover', 'Cover',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('cover', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-actions">
    <a href="{!! route('kecamatans.index') !!}" class="btn btn-danger">
        <i class="fa fa-check-square-o"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="ft-x"></i> Save
    </button>
</div>
