@extends('layouts.backend.master')
@section('title')
Cek Keluar Pengunjung
@endsection
@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-header">
                        Cek Keluar Pengunjung
                    </h4>
                    <form class="form-input" id="form-checkout">
                        <div class="card-body">
                            <div class="text-center">
                                <label for="kode_pengunjung">Kode Pengunjung</label>
                            </div>
                            <div class="form-inline d-flex justify-content-center">
                                <!-- <div class="d-flex justify-content-center"> -->
                                <input type="text" name="kode_pengunjung" id="kode_pengunjung" class="form-control form-control-lg border-dark">
                                <button type="button" class="btn btn-lg btn-primary mx-2" id="btn-cek-pengunjung">
                                    <i class="c-icon fa fa-search"></i>
                                </button>
                                <!-- </div> -->
                            </div>
                            <div class="text-center">

                            <div id="err-kode_pengunjung"></div>
                            </div>
                        </div>
                    </form>
                    <div id="pengunjung-ada" class="sembunyi card-body">
                        <hr>
                        <h4>
                            Detail pengunjung
                        </h4>
                        <p>
                            Jenis Pengunjung : <span id="jenis_pengunjung"></span><br>
                            Jumlah Pengunjung : <span id="jumlah_pengunjung"></span>
                        </p>
                        <div class="col-sm-12">
                            @include('backend.entry._table')
                        </div>
                        <div class="col-sm-12 d-flex justify-content-end my-3">
                            <form action="{{ route('entry.out.post') }}" method="POST">
                                @csrf
                                <input type="hidden" name="type_search" id="type_search" value="out">
                                <input type="hidden" id="kode_transaksi" name="kode_transaksi">
                                <button class="btn btn-primary"><i class="fa fa-check"></i> Verifikasi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@include('backend.entry.script-out')
@endpush