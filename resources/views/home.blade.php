@extends('layouts.app')

@section('content')
<div class="content-body">
    <div class="row match-height">
        @role('kasir')
        <div class="col-lg-8 col-md-12 mb-1">
            <div class="card alert alert-warning alert-dismissible mb-2 pl-2" role="alert">
                <div class="media align-items-stretch mb-1">
                    <div class="align-self-center">
                        <i class="fa fa-bullhorn font-large-2 mr-2"></i>
                    </div>
                    <div class="media-body align-self-center">
                        <span class="font-large-1">Perhatian</span>
                    </div>
                </div>
                <p class="mb-2 mt-1">Selamat datang di sistem admin GLOPOS, silahkan lakukan perubahan atau penambahan data di sistem admin ini. Pastikan perubahan dan penambahan data sudah
                mendapatkan persetujuan dari pimpinan.</p>
                <span class="font-medium-1">Terimakasih.</span>
            </div>
        </div>
        @endrole
        @role('pelanggan')
        <div class="col-lg-8 col-md-12 mb-1">
            <div class="card alert alert-warning alert-dismissible mb-2 pl-2" role="alert">
                <div class="media align-items-stretch mb-1">
                    <div class="align-self-center">
                        <i class="fa fa-bullhorn font-large-2 mr-2"></i>
                    </div>
                    <div class="media-body align-self-center">
                        <span class="font-large-1">Perhatian</span>
                    </div>
                </div>
                <p class="mb-2 mt-1">Selamat datang member GLOPOS, sepertinya anda tersesat silahkan <code>Logout</code> pada halaman ini.</p>
                <span class="font-medium-1">Terimakasih.</span>
            </div>
        </div>
        @endrole

        <div class="col-lg-4 col-md-12">
            <div class="card profile-card-with-cover">
                <div class="card-content">
                    <!--<img class="card-img-top img-fluid" src="../../../app-assets/images/carousel/18.jpg" alt="Card cover image">-->
                    <div class="card-img-top img-fluid bg-cover height-100" style="background: url('{{'app-assets/images/backgrounds/back_G.jpeg'}}');"></div>
                    <div class="card-profile-image-2">
                        <img src="{{asset('app-assets/images/portrait/small/user.png')}}" height="90" width="90" class="rounded-circle img-border box-shadow-1"
                             alt="Card image">
                    </div>
                    <div class="profile-card-with-cover-content text-center">
                        <div class="profile-details mb-1">
                            <span class="text-bold-600">Apa Kabar {!! Auth::user()->name !!}</span><br>
                            <span>{!! Auth::user()->email !!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @role('kasir')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="row pb-1 pt-1">
                        <div class="col-lg-3 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
                            <div class="p-1 text-center">
                                <div>
                                    <i class="ft-users success font-large-2"></i>
                                    <h4 class="font-large-1 blue-grey darken-1 mt-1 p-0 m-0">{{\App\Models\Pelanggan::count()}}</h4>
                                    <a href="{!! route('pelanggans.index') !!}" class="blue-grey darken-1 font-medium-1">Member Terdaftar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
                            <div class="p-1 text-center">
                                <div>
                                    <i class="ft-briefcase info font-large-2"></i>
                                    <h4 class="font-large-1 blue-grey darken-1 mt-1 p-0 m-0">{{\App\Models\Site::count()}}</h4>
                                    <a href="{!! route('sites.index') !!}" class="blue-grey darken-1 font-medium-1">Outlet</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
                            <div class="p-1 text-center">
                                <div>
                                    <i class="ft-shopping-cart warning font-large-2"></i>
                                    <h4 class="font-large-1 blue-grey darken-1 mt-1 p-0 m-0">{{\App\Models\Penjualan::count()}}</h4>
                                    <a href="{!! route('penjualans.index') !!}" class="blue-grey darken-1 font-medium-1">Transaksi</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <div class="p-1 text-center">
                                <div>
                                    <i class="ft-award danger font-large-2"></i>
                                    <h4 class="font-large-1 blue-grey darken-1 mt-1 p-0 m-0">{{\App\Models\Voucher::count()}}</h4>
                                    <a href="{!! route('vouchers.index') !!}" class="blue-grey darken-1 font-medium-1">Reward</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endrole

    <div class="row">
        <div class="col-12 mb-5">
            <ul class="timeline card border-grey border-lighten-2 p-0">
                @foreach(\App\Models\Berita::orderBy('id','asc')->paginate(5) as $berita)
                <li class="col-md-12 timeline-item border-bottom-blue-grey border-bottom-lighten-5 p-0 m-0">
                    <div class="timeline-card">
                        <div class="card-header rounded-1">
                            <div class="media">
                                <div class="media-left pr-1">
                                    <a href="#">
                                            <span class="avatar avatar-md avatar-busy box-shadow-1">
                                                <img src="{{asset('app-assets/images/portrait/small/user.png')}}" alt="avatar">
                                            </span>
                                        <i></i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="blue-grey darken-3 text-bold-600">{!! $berita->judul !!}</h5>
                                    <p class="card-subtitle text-muted">
                                        {{--{{\Jenssegers\Date\Date::now()->format('l, j F Y')}}--}}
                                        <span class="font-small-4"> {{\Jenssegers\Date\Date::parse($berita->created_at)->format('l, j F Y ~ H:i')}}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div style="text-align: center;">
                            <img class="align bg-cover height-300" src="{{ asset($berita->foto) }}">
                            <!-- <img class="$berita->foto"  src="{{asset('$berita/foto')}}" alt=""> -->
                            <!-- <img src="{{asset('resources/assets/bootstrap/image.png')}}"> -->
                        </div>

                        <div class="card-body pb-0 pt-0">
                            <p class="card-text font-medium-1">{!! $berita->isi !!}</p>
                        </div>

                        <div class="card-content">
                            <div class="p-1 float-right mr-1">
                                <span class="blue-grey darken-3 text-bold-600">Admin {!! $berita->user->name !!}</span>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
                 @role('kasir')
                    <li class="col-md-12 timeline-item border-bottom-blue-grey border-bottom-lighten-5 p-2">
                        <div class="col-md-12 align-items-center justify-content-center text-center">
                            <a class="text-center grey" href="{!! route('beritas.index') !!}">Berita Selengkapnya</a>
                        </div>
                    </li>
                @endrole
            </ul>
        </div>
    </div>

</div>
@endsection
