@extends('layouts.backend.master')
@section('title')
Data Aktivitas Pengunjung
@endsection
@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12">
                <div class="card rounded-lg">
                    <div class="card-header pb-0">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item float-left">
                                <h4><i class="fas fa-bars"></i> Data Aktivitas Pengunjung</h4>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                @include('backend.aktivitas._table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@include('backend.aktivitas.scripts');
@endpush