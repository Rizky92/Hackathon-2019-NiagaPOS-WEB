@extends('layouts.app')

@section('content')
<section id="horizontal-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card overflow-hidden">
                <div class="card-content">
                    <div class="media align-items-stretch">
                        <div class="bg-success p-2 media-middle">
                            <i class="fa fa-edit font-large-2 text-white"></i>
                        </div>
                        <div class="media-body p-1">
                            <h2 class="success">Store</h2>
                            <span style="margin-top: -5px">Membuat data Store baru.</span>
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
                        {!! Form::open(['route' => 'stores.store','class'=>'form form-horizontal']) !!}
                        <div class="form-body">
                            <h4 class="form-section"><i class="ft-user"></i> Store</h4>

                        @include('stores.fields')

                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
