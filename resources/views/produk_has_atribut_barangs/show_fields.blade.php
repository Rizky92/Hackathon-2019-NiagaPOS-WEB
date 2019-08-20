<!-- Produk Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('produk_id', 'Produk Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $produkHasAtributBarang->produk_id !!}</p>
    </div>
</div>

<!-- Atribut Barang Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('atribut_barang_id', 'Atribut Barang Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $produkHasAtributBarang->atribut_barang_id !!}</p>
    </div>
</div>

<!-- Value Field -->
<div class="form-group row mb-1">
    {!! Form::label('value', 'Value',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $produkHasAtributBarang->value !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group row mb-1">
    {!! Form::label('created_at', 'Created At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $produkHasAtributBarang->created_at !!}</p>
    </div>
</div>

<!-- Deleted At Field -->
<div class="form-group row mb-1">
    {!! Form::label('deleted_at', 'Deleted At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $produkHasAtributBarang->deleted_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group row mb-1">
    {!! Form::label('updated_at', 'Updated At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $produkHasAtributBarang->updated_at !!}</p>
    </div>
</div>

