<!-- Nama Field -->
<div class="form-group row">
    {!! Form::label('nama', 'Nama',['class' => 'col-sm-2 label-control']) !!}
    <div class="col-md-4">
        {!! Form::text('nama', null, ['placeholder'=>'Input Nama Produk','class' => 'form-control']) !!}
    </div>
    {!! Form::label('kategori_barang_id', 'Kategori',['class' => 'col-sm-2 label-control']) !!}
    <div class="col-md-3">
        {!! Form::select('kategori_barang_id', $katagori , null, ['placeholder'=>'','class' => 'form-control']) !!}
    </div>
</div>


<!-- Barcode Field -->
<div class="form-group row">
    {!! Form::label('barcode', 'Barcode',['class' => 'col-md-2 label-control']) !!}
    <div class="col-md-4">
        {!! Form::text('barcode', null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::label('satuan_terkecil', 'Satuan',['class' => 'col-md-2 label-control']) !!}
    <div class="col-md-3">
        {!! Form::select('satuan_terkecil', $satuan,null, ['placeholder'=>'','class' => 'form-control']) !!}
    </div>
</div>

<!-- Produsen Id Field -->
<div class="form-group row">
    {!! Form::label('penjualan', 'Penjualan',['class' => 'col-md-2 label-control']) !!}
    <div class="col-md-4">
        {!! Form::number('penjualan', null, ['placeholder'=>'dapat anda kosongkan','class' => 'form-control']) !!}
    </div>

    {!! Form::label('jenis_barang_id', 'Jenis Barang',['class' => 'col-md-2 label-control']) !!}
    <div class="col-md-3">
        {!! Form::Select('jenis_barang_id',$jenis_produk ,null, ['placeholder'=>'','class' => 'form-control']) !!}
    </div>

</div>

<!-- Pebelian Field -->
<div class="form-group row">
    {!! Form::label('pembelian', 'Pembelian',['class' => 'col-md-2 label-control']) !!}
    <div class="col-md-4">
        {!! Form::number('pembelian', null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::label('produsen_id', 'Produsen',['class' => 'col-md-2 label-control']) !!}
    <div class="col-md-3">
        {!! Form::Select('produsen_id',$produsen ,null, ['placeholder'=>'---','class' => 'form-control']) !!}
    </div>
</div> 

<!-- Ppn Persen Field -->
<div class="form-group row">
    {!! Form::label('ppn_persen', 'Ppn Persen',['class' => 'col-md-2 label-control']) !!}
    <div class="col-md-4">
        {!! Form::number('ppn_persen', null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::label('distributor_id', 'Distributor',['class' => 'col-md-2 label-control']) !!}
    <div class="col-md-3">
        {!! Form::select('distributor_id',$distributor ,null, ['placeholder'=>'---','class' => 'form-control']) !!}
    </div>
</div>

<!-- Margin Persen Field -->
<div class="form-group row">
    {!! Form::label('margin_persen', 'Margin Persen',['class' => 'col-md-2 label-control']) !!}
    <div class="col-md-4">
        {!! Form::number('margin_persen', null, ['class' => 'form-control']) !!}
    </div>
    <!-- <div class="col-md-3">
        {!! Form::hidden('store_id',Auth::user()->site->store_id,null, ['placeholder'=>'','class' => 'form-control']) !!}
    </div> -->
</div>

<!-- Diskon Persen Field -->
<div class="form-group row">
    {!! Form::label('diskon_persen', 'Diskon Persen',['class' => 'col-md-2 label-control']) !!}
    <div class="col-md-4">
        {!! Form::number('diskon_persen', null, ['class' => 'form-control']) !!}
    </div>
    
</div>

<!-- Stok Minimal Field -->
<div class="form-group row">
    {!! Form::label('stok_minimal', 'Stok Minimal',['class' => 'col-md-2 label-control']) !!}
    <div class="col-md-4">
        {!! Form::number('stok_minimal', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Default Input Field -->
<div class="form-group row">
    {!! Form::label('default_input', 'Default Input',['class' => 'col-md-2 label-control']) !!}
    <div class="col-md-4">
        {!! Form::number('default_input', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('foto', 'Foto',['class' => 'col-md-2 label-control']) !!}
    <div class="col-md-9">
        {!! Form::file('foto', null, ['class' => 'form-control']) !!}
        <br><br><code>Upload max pixel file = 400 - 700 pixel.</code>
    </div>
</div>

<!-- Submit Field -->
<div class="form-actions">
    <div class="offset-md-9">
    <a href="produks.index" class="btn btn-danger">
        <i class="ft-x"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="fa fa-check-square-o"></i> Save
    </button> 
    </div>
</div>
