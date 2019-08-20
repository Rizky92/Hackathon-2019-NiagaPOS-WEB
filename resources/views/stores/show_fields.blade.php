<!-- Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('id', 'Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $store->id !!}</p>
    </div>
</div>

<!-- Kode Field -->
<div class="form-group row mb-1">
    {!! Form::label('kode', 'Kode',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $store->kode !!}</p>
    </div>
</div>

<!-- Nama Field -->
<div class="form-group row mb-1">
    {!! Form::label('nama', 'Nama',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $store->nama !!}</p>
    </div>
</div>

<!-- Kontak Field -->
<div class="form-group row mb-1">
    {!! Form::label('kontak', 'Kontak',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $store->kontak !!}</p>
    </div>
</div>

<!-- Alamat Field -->
<div class="form-group row mb-1">
    {!! Form::label('alamat', 'Alamat',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $store->alamat !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group row mb-1">
    {!! Form::label('created_at', 'Created At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $store->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group row mb-1">
    {!! Form::label('updated_at', 'Updated At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $store->updated_at !!}</p>
    </div>
</div>

<!-- Deleted At Field -->
<div class="form-group row mb-1">
    {!! Form::label('deleted_at', 'Deleted At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $store->deleted_at !!}</p>
    </div>
</div>

