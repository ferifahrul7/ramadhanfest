@extends('layouts.backend.master')
@section('title')
Home
@endsection
@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-info text-light">
                    <div class="card-body">
                        <h4 class="text-center">Jumlah Pengunjung belum masuk</h4>
                        <h1 id="pengunjung-daftar" class="text-center">{{ $pengunjung['daftar'] }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-light">
                    <div class="card-body">
                        <h4 class="text-center">Jumlah Pengunjung di area festival</h4>
                        <h1 id="pengunjung-in" class="text-center">{{ $pengunjung['in'] }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-light">
                    <div class="card-body">
                        <h4 class="text-center">Jumlah Pengunjung sudah keluar</h4>
                        <h1 id="pengunjung-out" class="text-center">{{ $pengunjung['out'] }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher("{{ config('broadcasting.connections.pusher.key') }}", {
        cluster: "{{ config('broadcasting.connections.pusher.options.cluster') }}"
    });

    var channel = pusher.subscribe('pengunjung-counter');
    channel.bind('App\\Events\\PengunjungAction', function(data) {

        $('#pengunjung-daftar').fadeOut(400, function() {
            $('#pengunjung-daftar').text(data.jumlah_daftar);
            $('#pengunjung-daftar').fadeIn(400);
        });

        $('#pengunjung-in').fadeOut(400, function() {
            $('#pengunjung-in').text(data.jumlah_in);
            $('#pengunjung-in').fadeIn(400);
        });

        $('#pengunjung-out').fadeOut(400, function() {
            $('#pengunjung-out').text(data.jumlah_out);
            $('#pengunjung-out').fadeIn(400);
        });
    });
</script>
@endpush