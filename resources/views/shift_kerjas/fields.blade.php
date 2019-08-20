<!-- Nama Field -->
<div class="form-group row">
    {!! Form::label('nama', 'Nama',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Waktu Mulai Field -->
<div class="form-group row">
    {!! Form::label('waktu_mulai', 'Waktu Mulai',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('waktu_mulai', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Waktu Selesai Field -->
<div class="form-group row">
    {!! Form::label('waktu_selesai', 'Waktu Selesai',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('waktu_selesai', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-actions">
    <a href="shiftKerjas.index" class="btn btn-danger">
        <i class="ft-x"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="fa fa-check-square-o"></i> Save
    </button>
</div>
