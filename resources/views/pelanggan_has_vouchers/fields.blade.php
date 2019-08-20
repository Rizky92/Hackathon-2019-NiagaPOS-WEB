<!-- Pelanggan Id Field -->
<div class="form-group row">
    {!! Form::label('pelanggan_id', 'Pelanggan Id',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('pelanggan_id', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Voucher Id Field -->
<div class="form-group row">
    {!! Form::label('voucher_id', 'Voucher Id',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('voucher_id', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Point Field -->
<div class="form-group row">
    {!! Form::label('point', 'Point',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('point', null, ['class' => 'form-control']) !!}
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
    <a href="pelangganHasVouchers.index" class="btn btn-danger">
        <i class="ft-x"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="fa fa-check-square-o"></i> Save
    </button>
</div>
