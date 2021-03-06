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
                                        <i class="ft-airplay dark font-large-3"></i>
                                    </div>
                                </div>
                                <div class="float-left mt-1 ml-1">
                                    <h3 class="text-uppercase"><b class="blue-dark">Detil Penjualans</b></h3>
                                    <p>Data semua Detil Penjualans yang di simpan.</p>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @include('detil_penjualans.table')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

