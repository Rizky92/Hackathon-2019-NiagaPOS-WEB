
{!! Form::hidden('admin_id',Auth::id(), ['class' => 'form-control']) !!}


<!-- Nama Field -->
<div class="form-group row">
    {!! Form::label('nama', 'Nama',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Point Field -->
<div class="form-group row">
    {!! Form::label('point', 'Point',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('point', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Point Field -->
<div class="form-group row">
    {!! Form::label('promo_awal', 'Promo Awal Daftar',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::select('promo_awal',[0=>'Tidak',1=>'Ya'] ,null, ['class' => 'form-control']) !!}
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

<!-- Keterangan Field -->
<div class="form-group row">
    {!! Form::label('keterangan', 'Keterangan',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Mulai Berlaku Field -->
<div class="form-group row">
    {!! Form::label('mulai_berlaku', 'Mulai Berlaku',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::date('mulai_berlaku', isset($voucher)&&!is_null($voucher->mulai_berlaku)?$voucher->mulai_berlaku->format('Y-m-d'):null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Akhir Berlaku Field -->
<div class="form-group row">
    {!! Form::label('akhir_berlaku', 'Akhir Berlaku',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::date('akhir_berlaku', isset($voucher)&&!is_null($voucher->akhir_berlaku)?$voucher->akhir_berlaku->format('Y-m-d'):null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Users Id Field -->
{!! Form::hidden('users_id', Auth::id()) !!}

<!-- Submit Field -->
<div class="form-actions">
    <a href="{!! route('vouchers.index') !!}" class="btn btn-danger">
        <i class="ft-x"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="fa fa-check-square-o"></i> Save
    </button>
</div>
