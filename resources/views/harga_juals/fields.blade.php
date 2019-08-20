<!-- Produk Id <span class="required">*</span> Field -->
<div class="form-group row">
    {!! Form::label('produk_id', 'Produk Id     ',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-4">
        {!! Form::select('produk_id', $produk,null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-md-2">
        {!! Form::number('value', null, ['class' => 'form-control']) !!}
    </div>
</div>
<!-- Start From Field -->
<div class="form-group row">
    {!! Form::label('start_from', 'Start From',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-3">
        {!! Form::date('start_from', null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::label('valid_until', 'Valid Until',['class' => 'col-md-0 label-control']) !!}
    <div class="col-md-3">
        {!! Form::date('valid_until', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Valid Until Field -->
<div class="form-group row">
    
</div>


<!-- Store Id <span class="required">*</span> Field -->
<div class="col-md-3">
        {!! Form::hidden('store_id',Auth::user()->site->store_id,null, ['placeholder'=>'','class' => 'form-control']) !!}
</div>

<!-- Site Id <span class="required">*</span> Field -->
<div class="col-md-3">
        {!! Form::hidden('site_id',Auth::user()->site_id,null, ['placeholder'=>'','class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-actions">
    <a href="{!! route('hargaJuals.index') !!}" class="btn btn-danger">
        <i class="fa fa-check-square-o"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="ft-x"></i> Save
    </button>
</div>
