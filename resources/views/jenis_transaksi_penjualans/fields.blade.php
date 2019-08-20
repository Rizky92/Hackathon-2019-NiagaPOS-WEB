<!-- Nama Field -->
<div class="form-group row">
    {!! Form::label('nama', 'Nama',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Margin Persen Field -->
<div class="form-group row">
    {!! Form::label('margin_persen', 'Margin Persen',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('margin_persen', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Store Id Field -->
<div class="col-md-3">
        {!! Form::hidden('store_id',Auth::user()->site->store_id,null, ['placeholder'=>'','class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-actions">
    <a href="jenisTransaksiPenjualans.index" class="btn btn-danger">
        <i class="ft-x"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="fa fa-check-square-o"></i> Save
    </button>
</div>
