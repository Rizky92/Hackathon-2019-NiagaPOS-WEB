<!-- Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('id', 'Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $berita->id !!}</p>
    </div>
</div>

<!-- Judul Field -->
<div class="form-group row mb-1">
    {!! Form::label('judul', 'Judul',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $berita->judul !!}</p>
    </div>
</div>

<!-- Isi Field -->
<div class="form-group row mb-1">
    {!! Form::label('isi', 'Isi',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $berita->isi !!}</p>
    </div>
</div>

<!-- Foto Field -->
<div class="form-group row mb-1">
    {!! Form::label('foto', 'Foto',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $berita->foto !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group row mb-1">
    {!! Form::label('created_at', 'Created At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $berita->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group row mb-1">
    {!! Form::label('updated_at', 'Updated At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $berita->updated_at !!}</p>
    </div>
</div>

<!-- Deleted At Field -->
<div class="form-group row mb-1">
    {!! Form::label('deleted_at', 'Deleted At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $berita->deleted_at !!}</p>
    </div>
</div>

<!-- Admin Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('admin_id', 'Admin Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $berita->admin_id !!}</p>
    </div>
</div>

<!-- Mulai Berlaku Field -->
<div class="form-group row mb-1">
    {!! Form::label('mulai_berlaku', 'Mulai Berlaku',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $berita->mulai_berlaku !!}</p>
    </div>
</div>

<!-- Akhir Berlaku Field -->
<div class="form-group row mb-1">
    {!! Form::label('akhir_berlaku', 'Akhir Berlaku',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $berita->akhir_berlaku !!}</p>
    </div>
</div>

