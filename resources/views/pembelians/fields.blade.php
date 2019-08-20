<!-- Faktur Pembelian Field -->
<div class="form-group row">
    {!! Form::label('faktur_pembelian', 'Faktur Pembelian',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('faktur_pembelian', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Faktur Distributor Field -->
<div class="form-group row">
    {!! Form::label('faktur_distributor', 'Faktur Distributor',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('faktur_distributor', null, ['class' => 'form-control']) !!}
    </div>
</div>
<!-- Distributor Id Field -->
<div class="form-group row">
    {!! Form::label('distributor_id', 'Distributor Id',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::select('distributor_id',$distributor ,null, ['placeholder'=>' ','class' => 'form-control']) !!}
    </div>
</div>

<!-- Site Id Field -->
<div class="col-md-3">
        {!! Form::hidden('site_id',Auth::user()->site_id,null, ['placeholder'=>'','class' => 'form-control']) !!}
    </div>
</div>

<!-- Tanggal Faktur Field -->
<div class="form-group row">
    {!! Form::label('tanggal_faktur', 'Tanggal Faktur',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::date('tanggal_faktur', null, ['class' => 'form-control']) !!}
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

<!-- Users Id Field -->
<div class="col-md-3">
        {!! Form::hidden('users_id',Auth::user()->id,null, ['placeholder'=>'','class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-actions">
    <a href="pembelians.index" class="btn btn-danger">
        <i class="ft-x"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="fa fa-check-square-o"></i> Save
    </button>
</div>
