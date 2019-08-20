<!-- Id Field -->

<!-- Judul Field -->
<div class="form-group row mb-1">
    {!! Form::label('judul', 'Judul',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $promosi->judul !!}</p>
    </div>
</div>

<!-- Isi Field -->
<div class="form-group row mb-1">
    {!! Form::label('isi', 'Isi',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $promosi->isi !!}</p>
    </div>
</div>

<!-- Foto Field -->
<div class="form-group row mb-1">
    {!! Form::label('foto', 'Foto',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $promosi->foto !!}</p>
    </div>
</div>

<!-- Mulai Promosi Field -->
<div class="form-group row mb-1">
    {!! Form::label('mulai_promosi', 'Mulai Promosi',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $promosi->mulai_promosi !!}</p>
    </div>
</div>

<!-- Akhir Promosi Field -->
<div class="form-group row mb-1">
    {!! Form::label('akhir_promosi', 'Akhir Promosi',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $promosi->akhir_promosi !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group row mb-1">
    {!! Form::label('created_at', 'Created At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $promosi->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group row mb-1">
    {!! Form::label('updated_at', 'Updated At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $promosi->updated_at !!}</p>
    </div>
</div>

<!-- Deleted At Field -->
<div class="form-group row mb-1">
    {!! Form::label('deleted_at', 'Deleted At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $promosi->deleted_at !!}</p>
    </div>
</div>

<!-- Users Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('users_id', 'Users Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $promosi->user->name !!}</p>
    </div>
</div>

