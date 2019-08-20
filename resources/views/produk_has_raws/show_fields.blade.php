<!-- Produk Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('produk_id', 'Produk Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $produkHasRaw->produk_id !!}</p>
    </div>
</div>

<!-- Produk Raw Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('produk_raw_id', 'Produk Raw Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $produkHasRaw->produk_raw_id !!}</p>
    </div>
</div>

<!-- Jumlah Field -->
<div class="form-group row mb-1">
    {!! Form::label('jumlah', 'Jumlah',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $produkHasRaw->jumlah !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group row mb-1">
    {!! Form::label('created_at', 'Created At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $produkHasRaw->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group row mb-1">
    {!! Form::label('updated_at', 'Updated At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $produkHasRaw->updated_at !!}</p>
    </div>
</div>

<!-- Deleted At Field -->
<div class="form-group row mb-1">
    {!! Form::label('deleted_at', 'Deleted At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $produkHasRaw->deleted_at !!}</p>
    </div>
</div>

<!-- Users Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('users_id', 'Users Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $produkHasRaw->users_id !!}</p>
    </div>
</div>

