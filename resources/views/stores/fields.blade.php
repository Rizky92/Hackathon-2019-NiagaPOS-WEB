<!-- Kode Field -->
<div class="form-group row">
    {!! Form::label('kode', 'Kode',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('kode', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Nama Field -->
<div class="form-group row">
    {!! Form::label('nama', 'Nama',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Kontak Field -->
<div class="form-group row">
    {!! Form::label('kontak', 'Kontak',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('kontak', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Alamat Field -->
<div class="form-group row">
    {!! Form::label('alamat', 'Alamat',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-actions">
    <a href="stores.index" class="btn btn-danger">
        <i class="ft-x"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="fa fa-check-square-o"></i> Save
    </button>
</div>
