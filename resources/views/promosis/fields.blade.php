<div class="col-md-3">
        {!! Form::hidden('store_id',Auth::user()->name,null, ['placeholder'=>'','class' => 'form-control']) !!}
</div>

<!-- Judul Field -->
<div class="form-group row">
    {!! Form::label('judul', 'Judul',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('judul', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Isi Field -->
<div class="form-group row">
    {!! Form::label('isi', 'Isi',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('isi', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Foto Field -->
<div class="form-group row">
    {!! Form::label('foto', 'Foto',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::file('foto', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Mulai Promosi Field -->
<div class="form-group row">
    {!! Form::label('mulai_promosi', 'Mulai Promosi',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::date('mulai_promosi', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Akhir Promosi Field -->
<div class="form-group row">
    {!! Form::label('akhir_promosi', 'Akhir Promosi',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::date('akhir_promosi', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Users Id Field -->
{!! Form::hidden('users_id', Auth::id()) !!}

<!-- Submit Field -->
<div class="form-actions">
    <a href="promosis.index" class="btn btn-danger">
        <i class="ft-x"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="fa fa-check-square-o"></i> Save
    </button>
</div>
