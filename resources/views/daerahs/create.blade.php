@extends('layouts.app')

@section('content')
<section id="horizontal-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card overflow-hidden">
                <div class="card-content">
                    <div class="media align-items-stretch">
                        <div class="bg-success p-2 media-middle">
                            <i class="fa fa-map -square-o font-large-2 text-white"></i>
                        </div>
                        <div class="media-body p-1">
                            <h2 class="success">Daerah</h2>
                            <span style="margin-top: -5px">Membuat data Daerah baru.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">

            @include('adminlte-templates::common.errors')

            <div class="card">
                <div class="card-content collpase show">
                    <div class="card-body">
                        {!! Form::open(['route' => 'daerahs.store','class'=>'form form-horizontal']) !!}
                        <div class="form-body">
                            <h4 class="form-section"><i class="ft-user"></i> Daerah</h4>

                        @include('daerahs.fields')

                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
