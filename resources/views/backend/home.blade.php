@extends('layouts.backend.master')
@section('title')
Home
@endsection
@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Jumlah Pengunjung yang belum masuk</h4>
                        <h1 id="pengunjung-daftar" class="text-center">{{ $pengunjung }}</h1>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Jumlah Pengunjung yang berada di area festival</h4>
                        <h1 id="pengunjung-in" class="text-center">{{ $pengunjung }}</h1>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Jumlah Pengunjung yang sudah keluar</h4>
                        <h1 id="pengunjung-out" class="text-center">{{ $pengunjung }}</h1>
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