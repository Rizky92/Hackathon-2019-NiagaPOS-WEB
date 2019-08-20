<!-- Detil Penjualan Id Field -->
<div class="form-group row">
    {!! Form::label('detil_penjualan_id', 'Detil Penjualan Id',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::select('detil_penjualan_id', $detilpenjualan,null, ['class' => 'form-control']) !!}
    </div> 
</div>

<!-- Jumlah Return Field -->
<div class="form-group row">
    {!! Form::label('jumlah_return', 'Jumlah Return',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('jumlah_return', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Total Return Field -->
<div class="form-group row">
    {!! Form::label('total_return', 'Total Return',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('total_return', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Alasan Field -->
<div class="form-group row">
    {!! Form::label('alasan', 'Alasan',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('alasan', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Kode Admin Field -->
<div class="form-group row">
    {!! Form::label('kode_admin', 'Kode Admin',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::label('kode_admin',Auth::user()->id, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Site Id Field -->
    <div class="col-md-9">
        {!! Form::hidden('site_id', Auth::user()->site_id ,null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Users Id Field -->
    <div class="col-md-9">
        {!! Form::hidden('users_id',Auth::user()->id ,null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-actions">
    <a href="returnPenjualans.index" class="btn btn-danger">
        <i class="ft-x"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="fa fa-check-square-o"></i> Save
    </button>
</div>
