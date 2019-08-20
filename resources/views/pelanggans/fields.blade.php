<!-- Nama Field -->
<div class="form-group row">
    {!! Form::label('nama', 'Nama',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Jenis Kelamin Field -->
<div class="form-group row">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('jenis_kelamin', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Tanggal Lahir Field -->
<div class="form-group row">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::date('tanggal_lahir', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Pekerjaan Field -->
<div class="form-group row">
    {!! Form::label('pekerjaan', 'Pekerjaan',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('pekerjaan', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Alamat Field -->
<div class="form-group row">
    {!! Form::label('alamat', 'Alamat',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Kontak Field -->
<div class="form-group row">
    {!! Form::label('kontak', 'Kontak',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::text('kontak', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Site Id Field -->
<div class="form-group row">
    {!! Form::label('site_id', 'Site Id',['class' => 'col-md-3 label-control']) !!}
    <div class="col-md-9">
        {!! Form::select('site_id',$site ,null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Users Id Field -->
<div class="form-group row">
   <div class="col-md-3">
        {!! Form::hidden('users_id',Auth::user()->id,null, ['placeholder'=>'','class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-actions">
    <a href="pelanggans.index" class="btn btn-danger">
        <i class="ft-x"></i> Cancel
    </a>
    <button type="submit" class="btn btn-success mr-1">
        <i class="fa fa-check-square-o"></i> Save
    </button>
</div>
