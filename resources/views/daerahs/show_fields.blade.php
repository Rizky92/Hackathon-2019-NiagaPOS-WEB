<!-- Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('id', 'Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $daerah->id !!}</p>
    </div>
</div>

<!-- Nama Field -->
<div class="form-group row mb-1">
    {!! Form::label('nama', 'Nama',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $daerah->nama !!}</p>
    </div>
</div>

<!-- Keterangan Field -->
<div class="form-group row mb-1">
    {!! Form::label('keterangan', 'Keterangan',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $daerah->keterangan !!}</p>
    </div>
</div>

<!-- Daerah Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('daerah_id', 'Daerah Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $daerah->daerah_id !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group row mb-1">
    {!! Form::label('created_at', 'Created At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $daerah->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group row mb-1">
    {!! Form::label('updated_at', 'Updated At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $daerah->updated_at !!}</p>
    </div>
</div>

<!-- Deleted At Field -->
<div class="form-group row mb-1">
    {!! Form::label('deleted_at', 'Deleted At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $daerah->deleted_at !!}</p>
    </div>
</div>

