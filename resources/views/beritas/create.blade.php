@extends('layouts.app')

@section('content')
<section id="horizontal-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card overflow-hidden">
                <div class="card-content">
                    <div class="media align-items-stretch">
                        <div class="bg-success p-2 media-middle">
                            <i class="fa fa-newspaper-o font-large-2 text-white"></i>
                        </div>
                        <div class="media-body p-1">
                            <h2 class="success">Berita</h2>
                            <span style="margin-top: -5px">Membuat data Berita baru.</span>
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
                        {!! Form::open(['route' => 'beritas.store','files'=>true,'class'=>'form form-horizontal']) !!}
                        <div class="form-body">
                            <h4 class="form-section"><i class="ft-user"></i> Berita</h4>

                        @include('beritas.fields')

                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="card text-white box-shadow-0 bg-gradient-x-blue">
                <div class="card-header mb-0 pb-0">
                    <h4 class="card-title text-white">Panduan Pengisian</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <ol>
                            <li>Untuk pengisian table berita, perhatikan pada bagian pengisian kolom <code>Mulai Berlaku</code> dan <code>Akhir Berlaku</code>.</li><br>
                            <li>Jika ingin masa berlaku berita selamanya anda dapat mengosongkan atau tidak mengklik pada bidang isian <code>Mulai Berlaku</code> dan <code>Akhir Berlaku.</code>.</li>
                        </ol>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
