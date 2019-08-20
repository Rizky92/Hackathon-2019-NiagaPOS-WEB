<!-- Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('id', 'Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $kategori->id !!}</p>
    </div>
</div>

<!-- Nama Field -->
<div class="form-group row mb-1">
    {!! Form::label('nama', 'Nama',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $kategori->nama !!}</p>
    </div>
</div>

<!-- Parent Kategori Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('parent_kategori_id', 'Parent Kategori Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $kategori->parent_kategori_id !!}</p>
    </div>
</div>

<!-- Left Field -->
<div class="form-group row mb-1">
    {!! Form::label('left', 'Left',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $kategori->left !!}</p>
    </div>
</div>

<!-- Right Field -->
<div class="form-group row mb-1">
    {!! Form::label('right', 'Right',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $kategori->right !!}</p>
    </div>
</div>

<!-- Nesting Field -->
<div class="form-group row mb-1">
    {!! Form::label('nesting', 'Nesting',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $kategori->nesting !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group row mb-1">
    {!! Form::label('created_at', 'Created At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $kategori->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group row mb-1">
    {!! Form::label('updated_at', 'Updated At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $kategori->updated_at !!}</p>
    </div>
</div>

<!-- Deleted At Field -->
<div class="form-group row mb-1">
    {!! Form::label('deleted_at', 'Deleted At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $kategori->deleted_at !!}</p>
    </div>
</div>

<!-- Store Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('store_id', 'Store Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $kategori->store_id !!}</p>
    </div>
</div>

