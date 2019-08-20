<!-- Produk Id <span class="required">*</span> Field -->
<div class="form-group row">
    {!! Form::label('produk_id', 'Produk Id <span class="required">*</span>',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('produk_id', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Jumlah Field -->
<div class="form-group row">
    {!! Form::label('jumlah', 'Jumlah',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('jumlah', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-actions">
    <a href="{!! route('stoks.index') !!}" class="btn btn-danger">
        <i class="fa fa-check-square-o"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="ft-x"></i> Save
    </button>
</div>
