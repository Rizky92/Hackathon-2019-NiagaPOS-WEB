<!-- Site Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('site_id', 'Site Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $stok->site_id !!}</p>
    </div>
</div>

<!-- Produk Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('produk_id', 'Produk Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $stok->produk_id !!}</p>
    </div>
</div>

<!-- Jumlah Field -->
<div class="form-group row mb-1">
    {!! Form::label('jumlah', 'Jumlah',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $stok->jumlah !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group row mb-1">
    {!! Form::label('created_at', 'Created At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $stok->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group row mb-1">
    {!! Form::label('updated_at', 'Updated At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $stok->updated_at !!}</p>
    </div>
</div>

<!-- Deleted At Field -->
<div class="form-group row mb-1">
    {!! Form::label('deleted_at', 'Deleted At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $stok->deleted_at !!}</p>
    </div>
</div>

