@extends('layouts.app')

@section('content')
<section id="horizontal-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card overflow-hidden">
                <div class="card-content">
                    <div class="media align-items-stretch">
                        <div class="bg-warning p-2 media-middle">
                            <i class="ft-edit font-large-2 text-white"></i>
                        </div>
                        <div class="media-body p-1">
                            <h2 class="dark">Perubahan Data Jenis Transaksi Penjualan</h2>
                            <span style="margin-top: -5px">Membuat perubahan data pada Jenis Transaksi Penjualan.</span>
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

                        {!! Form::model($jenisTransaksiPenjualan, ['route' => ['jenisTransaksiPenjualans.update', $jenisTransaksiPenjualan->id], 'method' => 'patch','class'=>'form form-horizontal']) !!}

                        <div class="form-body">
                            <h4 class="form-section"><i class="ft-settings"></i> Jenis Transaksi Penjualan</h4>

                            @include('jenis_transaksi_penjualans.fields')

                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection