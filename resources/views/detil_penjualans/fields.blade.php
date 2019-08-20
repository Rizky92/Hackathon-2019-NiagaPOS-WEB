<!-- Penjualan Id <span class="required">*</span> Field -->
<div class="form-group row">
    {!! Form::label('penjualan_id', 'Penjualan Id <span class="required">*</span>',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('penjualan_id', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Satuan Id <span class="required">*</span> Field -->
<div class="form-group row">
    {!! Form::label('satuan_id', 'Satuan Id <span class="required">*</span>',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('satuan_id', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Produk Id <span class="required">*</span> Field -->
<div class="form-group row">
    {!! Form::label('produk_id', 'Produk Id <span class="required">*</span>',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('produk_id', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Harga Beli Field -->
<div class="form-group row">
    {!! Form::label('harga_beli', 'Harga Beli',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('harga_beli', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Jumlah Field -->
<div class="form-group row">
    {!! Form::label('jumlah', 'Jumlah',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('jumlah', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Ppn Field -->
<div class="form-group row">
    {!! Form::label('ppn', 'Ppn',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('ppn', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Margin Field -->
<div class="form-group row">
    {!! Form::label('margin', 'Margin',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('margin', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Harga Jual Field -->
<div class="form-group row">
    {!! Form::label('harga_jual', 'Harga Jual',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('harga_jual', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Diskon Field -->
<div class="form-group row">
    {!! Form::label('diskon', 'Diskon',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('diskon', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sub Total Field -->
<div class="form-group row">
    {!! Form::label('sub_total', 'Sub Total',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('sub_total', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Racikan Field -->
<div class="form-group row">
    {!! Form::label('racikan', 'Racikan',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('racikan', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-actions">
    <a href="{!! route('detilPenjualans.index') !!}" class="btn btn-danger">
        <i class="fa fa-check-square-o"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="ft-x"></i> Save
    </button>
</div>
