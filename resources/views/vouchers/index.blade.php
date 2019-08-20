
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
                                        <i class="fa fa-tags dark font-large-3"></i>
                                    </div>
                                </div>
                                <div class="float-left mt-1 ml-1">
                                    <h3 class="text-uppercase"><b class="blue-dark">Voucher</b></h3>
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

                                                    <a href="{!! route('vouchers.create') !!}" class="bg-blue p-1 media-middle text-center ">
                                                        <i class="fa fa-plus-square-o font-large-1 text-white"></i>
                                                        <h5 class="text-white">Tambah</h5>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @include('vouchers.table')

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
                            <li>Ada beberapa kolom isian pada table <code>Voucher</code> yang harus diisi.</li>
                            <li>Dalam pengisian perhatikan pada kolom yang akan diisi:
                                <ul>
                                    <li>Kolom Nama berisikan judul atau title <code>Voucher</code> yang akan dibuat, jangan memberikan judul pada voucher terlalu panjang.</li>
                                    <li>Kolom Point diisi dengan jumlah point yang telah di tentukan sebagai syarat penukaran.</li>
                                    <li>Kolom Foto dapat diisi gambar yang sesuai tema yang di input pada kolom judul. <code>Max pixel file = 400 - 700 pixel.</code></li>
                                    <li>Kolom Bonus Daftar terdapat 2 kondisi yaitu <code>YA dan TIDAk</code> , untuk kondisi " YA " maka Voucher akan di berikan kepada member baru
                                    yang mendaftar di aplikasi Citra Niaga, sedangkan untuk kondisi " TIDAK " maka Voucher tidak untuk member baru yang baru mendaftar.
                                    <code>Untuk kondisi "YA" hanya untuk 1 jenis voucher saja.</code></li>
                                    <li>Kolom Mulai Berlaku dan Akhir Berlaku memberikan awalan dan batasan masa aktif voucher yang dapat ditukar, jika sifat voucher berlaku
                                    selamanya makan pada kolom <code>Mulai Berlaku dan Akhir Berlaku</code> tidak perlu diisi.</li>

                                </ul>
                            </li>
                            <li>Perubahan data voucher dapat anda lakukan pada menu edit.</li>

                        </ol>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

