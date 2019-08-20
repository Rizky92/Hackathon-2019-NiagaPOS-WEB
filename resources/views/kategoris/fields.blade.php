<!-- Nama Field -->
<div class="form-group row">
    {!! Form::label('nama', 'Nama',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Parent Kategori Id Field -->
<!-- <div class="form-group row">
    {!! Form::label('parent_kategori_id', 'Parent Kategori Id',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('parent_kategori_id', null, ['class' => 'form-control']) !!}
    </div>
</div> -->

<!-- Left Field -->
<!-- <div class="form-group row">
    {!! Form::label('left', 'Left',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('left', null, ['class' => 'form-control']) !!}
    </div>
</div> -->

<!-- Right Field -->
<!-- <div class="form-group row">
    {!! Form::label('right', 'Right',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('right', null, ['class' => 'form-control']) !!}
    </div>
</div> -->

<!-- Nesting Field -->
<!-- <div class="form-group row">
    {!! Form::label('nesting', 'Nesting',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::number('nesting', null, ['class' => 'form-control']) !!}
    </div>
</div> -->

<!-- Store Id Field -->
<div class="form-group row">
    <div class="col-md-9">
        {!! Form::hidden('store_id', Auth::user()->site->store_id ,null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-actions">
    <a href="kategoris.index" class="btn btn-danger">
        <i class="ft-x"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="fa fa-check-square-o"></i> Save
    </button>
</div>
