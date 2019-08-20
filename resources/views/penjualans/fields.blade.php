<!-- Faktur Penjualan Field -->
<div class="form-group row">
    {!! Form::label('faktur_penjualan', 'Faktur Penjualan',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('faktur_penjualan', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Pelanggan Id Field -->
<div class="form-group row">
    {!! Form::label('pelanggan_id', 'Pelanggan Id',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('pelanggan_id', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Site Id Field -->
<div class="form-group row">
    {!! Form::label('site_id', 'Site Id',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('site_id', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Nomor Resep Field -->
<div class="form-group row">
    {!! Form::label('nomor_resep', 'Nomor Resep',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('nomor_resep', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Tanggal Jatuh Tempo Field -->
<div class="form-group row">
    {!! Form::label('tanggal_jatuh_tempo', 'Tanggal Jatuh Tempo',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::date('tanggal_jatuh_tempo', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Ppn Field -->
<div class="form-group row">
    {!! Form::label('ppn', 'Ppn',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('ppn', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Diskon Field -->
<div class="form-group row">
    {!! Form::label('diskon', 'Diskon',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('diskon', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Total Field -->
<div class="form-group row">
    {!! Form::label('total', 'Total',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('total', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Jenis Transaksi Penjualan Id Field -->
<div class="form-group row">
    {!! Form::label('jenis_transaksi_penjualan_id', 'Jenis Transaksi Penjualan Id',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('jenis_transaksi_penjualan_id', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Bayar Field -->
<div class="form-group row">
    {!! Form::label('bayar', 'Bayar',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('bayar', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Users Id Field -->
<div class="form-group row">
    {!! Form::label('users_id', 'Users Id',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('users_id', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Point Field -->
<div class="form-group row">
    {!! Form::label('point', 'Point',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('point', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-actions">
    <a href="penjualans.index" class="btn btn-danger">
        <i class="ft-x"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="fa fa-check-square-o"></i> Save
    </button>
</div>
