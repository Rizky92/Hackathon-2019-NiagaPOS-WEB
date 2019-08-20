<!-- Ppn Persen Field -->
<div class="form-group row">
    {!! Form::label('ppn_persen', 'Ppn Persen',['class' => 'col-md-2 label-control']) !!}
    <div class="col-md-4">
        {!! Form::number('ppn_persen', null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::label('distributor_id', 'Distributor',['class' => 'col-md-2 label-control']) !!}
    <div class="col-md-3">
        {!! Form::select('distributor_id',$distributor ,null, ['placeholder'=>'---','class' => 'form-control']) !!}
    </div>
</div>