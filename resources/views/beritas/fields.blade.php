<!-- Judul Field -->
<div class="form-group row">
    {!! Form::label('judul', 'Judul',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('judul', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Isi Field -->
<div class="form-group row">
    {!! Form::label('isi', 'Isi',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::textarea('isi', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Foto Field -->
<div class="form-group row">
    {!! Form::label('foto', 'Foto',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::file('foto', null, ['class' => 'form-control']) !!}
        <br><br><code>Upload max pixel file = 400 - 700 pixel.</code>
    </div>
</div>

<!-- Admin Id Field -->
{!! Form::hidden('admin_id', Auth::id(), ['class' => 'form-control']) !!}


<!-- Mulai Berlaku Field -->
<div class="form-group row">
    {!! Form::label('mulai_berlaku', 'Mulai Berlaku',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::date('mulai_berlaku', isset($berita)&&!is_null($berita->mulai_berlaku)?$berita->mulai_berlaku->format('Y-m-d'):null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Akhir Berlaku Field -->
<div class="form-group row">
    {!! Form::label('akhir_berlaku', 'Akhir Berlaku',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::date('akhir_berlaku', isset($berita)&&!is_null($berita->akhir_berlaku)?$berita->akhir_berlaku->format('Y-m-d'):null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-actions">
    <a href="{{route("beritas.index")}}" class="btn btn-danger">
        <i class="ft-x"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="fa fa-check-square-o"></i> Save
    </button>
</div>

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'isi' );
</script>