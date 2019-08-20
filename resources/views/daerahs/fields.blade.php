<!-- Nama Field -->
<div class="form-group row">
    {!! Form::label('nama', 'Nama',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Keterangan Field -->
<div class="form-group row">
    {!! Form::label('keterangan', 'Keterangan',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Daerah Id Field -->
{{--<div class="form-group row">
    {!! Form::label('daerah_id', 'Daerah Id',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::select('daerah_id', $listDaerah,null, ['class' => 'form-control']) !!}
    </div>--}}
{{--</div>--}}

<!-- Submit Field -->
<div class="form-actions">
    <a href="{!! route('daerahs.index') !!}" class="btn btn-danger">
        <i class="ft-x"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="fa fa-check-square-o"></i> Save
    </button>
</div>
