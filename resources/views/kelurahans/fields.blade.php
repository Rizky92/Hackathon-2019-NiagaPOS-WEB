<!-- Nama Field -->
<div class="form-group row">
    {!! Form::label('nama', 'Nama',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Kelurahan Id Field -->
<div class="form-group row">
    {!! Form::label('kelurahan_id', 'Kelurahan Id',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('kelurahan_id', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Website Field -->
<div class="form-group row">
    {!! Form::label('website', 'Website',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('website', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Telepon Field -->
<div class="form-group row">
    {!! Form::label('telepon', 'Telepon',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('telepon', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Fax Field -->
<div class="form-group row">
    {!! Form::label('fax', 'Fax',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('fax', null, ['class' => 'form-control']) !!}
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

<!-- Longitude Field -->
<div class="form-group row">
    {!! Form::label('longitude', 'Longitude',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('longitude', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Latitude Field -->
<div class="form-group row">
    {!! Form::label('latitude', 'Latitude',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('latitude', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Lurah Field -->
<div class="form-group row">
    {!! Form::label('lurah', 'Lurah',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('lurah', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Foto Lurah Field -->
<div class="form-group row">
    {!! Form::label('foto_lurah', 'Foto Lurah',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('foto_lurah', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-actions">
    <a href="{!! route('kelurahans.index') !!}" class="btn btn-danger">
        <i class="fa fa-check-square-o"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="ft-x"></i> Save
    </button>
</div>
