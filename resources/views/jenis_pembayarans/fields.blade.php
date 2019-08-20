<!-- Nama Field -->
<div class="form-group row">
    {!! Form::label('nama', 'Nama',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Diskon Persen Field -->
<div class="form-group row">
    {!! Form::label('diskon_persen', 'Diskon Persen',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('diskon_persen', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Margin Persen Field -->
<div class="form-group row">
    {!! Form::label('margin_persen', 'Margin Persen',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('margin_persen', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Tunai Field -->
<div class="form-group row">
    {!! Form::label('tunai', 'Tunai',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('tunai', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-actions">
    <a href="jenisPembayarans.index" class="btn btn-danger">
        <i class="ft-x"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="fa fa-check-square-o"></i> Save
    </button>
</div>
