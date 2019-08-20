@extends('layouts.app')

@section('content')
<div class="content-body">
    <div class="row">

        <div class="col-12">

            @include('flash::message')

            <div class="clearfix"></div>

            <div class="card">
                <div class="border-left-pink border-left-8 box-shadow-0">
                    <div class="card-content ">
                        <div class="card-body card-dashboard">
                            <div class="row">
                                <div class="float-left mt-1 ml-2">
                                    <div class="align-self-center">
                                        <i class="fa fa-newspaper-o dark font-large-3"></i>
                                    </div>
                                </div>
                                <div class="float-left mt-1 ml-1">
                                    <h3 class="text-uppercase"><b class="blue-dark">Berita</b></h3>
                                    <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                                    <div class="heading-elements">

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mt-0">
                                        <div class="card overflow-hidden">
                                            <div class="card-content">
                                                <div class="media bg-grey bg-lighten-4 align-items-stretch">
                                                    <div class="media-body p-2">
                                                        <div class="position-relative" id="filter_global">
                                                            <input type="text" class="form-control form-control-xl input-lg global_filter" id="global_filter" placeholder="Apa yang ingin dicari...">
                                                            <div class="form-control-position">
                                                                <i class="ft-search font-medium-4"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a href="{!! route('beritas.create') !!}" class="bg-blue p-1 media-middle text-center ">
                                                        <i class="fa fa-plus-square-o font-large-1 text-white"></i>
                                                        <h5 class="text-white">Tambah</h5>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @include('beritas.table')

                        </div>
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
                            <li>Isi kolom dari mulai berlaku berita hingga akhir masa berlaku berita.</li>
                            <li>Jika ingin masa berlaku selamanya anda dapat mengosongkan atau tidak mengklik pada bidang isian <code>Mulai Berlaku</code> dan <code>Akhir Berlaku.</code>.</li>
                            <li>Anda juga dapat mengedit pada kolom <code>Akhir Belaku</code> jika batas penampilan berakhir dan ingin di perpanjang kembali, Tekan tombol Edit untuk mengubah.</li>
                            <li>Pastikan dalam memasukan data berita dengan data yang sebenar-benarnya.</li>
                            <li>Untuk mengupload gambar <code>Max pixel file = 400 - 700 pixel.</code></li>
                        </ol>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

