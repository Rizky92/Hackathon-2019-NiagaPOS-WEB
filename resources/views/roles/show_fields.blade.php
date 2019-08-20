<!-- Id Field -->
<div class="form-group row mb-1">
    {!! Form::label('id', 'Id',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $role->id !!}</p>
    </div>
</div>

<!-- Name Field -->
<div class="form-group row mb-1">
    {!! Form::label('name', 'Name',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $role->name !!}</p>
    </div>
</div>

<!-- Display Name Field -->
<div class="form-group row mb-1">
    {!! Form::label('display_name', 'Display Name',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $role->display_name !!}</p>
    </div>
</div>

<!-- Description Field -->
<div class="form-group row mb-1">
    {!! Form::label('description', 'Description',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $role->description !!}</p>
    </div>
</div>

<!-- Created At Field -->
<div class="form-group row mb-1">
    {!! Form::label('created_at', 'Created At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $role->created_at !!}</p>
    </div>
</div>

<!-- Updated At Field -->
<div class="form-group row mb-1">
    {!! Form::label('updated_at', 'Updated At',['class' => 'col-md-3  label-control ']) !!}
    <div class="col-md-9">
        <p class="form-control">{!! $role->updated_at !!}</p>
    </div>
</div>

