<div class="form-group row">
     {!! Form::label('produk_id', 'Nama Poduk',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::label('produk_id', $produkid->nama ,null, ['class' => 'form-control']) !!}
    </div>
</div>
<!-- Produk Raw Id <span class="required">*</span> Field -->
<div class="form-group row">
    {!! Form::label('produk_raw_id', 'Produk Raw Id',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('produk_raw_id', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Jumlah Field -->
<div class="form-group row">
    {!! Form::label('jumlah', 'Jumlah',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('jumlah', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Users Id Field -->
<div class="form-group row">
    {!! Form::label('users_id', 'Users Id',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('users_id', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-actions">
    <a href="{!! route('produkHasRaws.index') !!}" class="btn btn-danger">
        <i class="fa fa-check-square-o"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="ft-x"></i> Save
    </button>
</div>
