<!-- Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('id', 'Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $jenisPembayaran->id !!}</p>
    </div>
</div>

<!-- Nama Field -->
<div class="form-group row mb-1">
    {!! Form::label('nama', 'Nama',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $jenisPembayaran->nama !!}</p>
    </div>
</div>

<!-- Diskon Persen Field -->
<div class="form-group row mb-1">
    {!! Form::label('diskon_persen', 'Diskon Persen',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $jenisPembayaran->diskon_persen !!}</p>
    </div>
</div>

<!-- Margin Persen Field -->
<div class="form-group row mb-1">
    {!! Form::label('margin_persen', 'Margin Persen',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $jenisPembayaran->margin_persen !!}</p>
    </div>
</div>

<!-- Tunai Field -->
<div class="form-group row mb-1">
    {!! Form::label('tunai', 'Tunai',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $jenisPembayaran->tunai !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group row mb-1">
    {!! Form::label('created_at', 'Created At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $jenisPembayaran->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group row mb-1">
    {!! Form::label('updated_at', 'Updated At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $jenisPembayaran->updated_at !!}</p>
    </div>
</div>

<!-- Deleted At Field -->
<div class="form-group row mb-1">
    {!! Form::label('deleted_at', 'Deleted At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $jenisPembayaran->deleted_at !!}</p>
    </div>
</div>

