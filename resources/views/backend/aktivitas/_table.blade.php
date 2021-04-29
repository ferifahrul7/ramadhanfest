@push('css')
	@include('datatables.datatables-css')
@endpush
<div class="col-sm-12">
    <div class="text-right" id="buttons"></div>
</div>
<table id="tabel-aktivitas" class="table table-hover table-sm table-sm-responsive" style="width:100%">
    <thead class="bg-info">
        <tr>
            <th>#</th>
            <th>NAMA PENGUNJUNG</th>
            <th>WAKTU MASUK</th>
            <th>WAKTU KELUAR</th>
            <th>KODE PENGUNJUNG</th>
            <th>ADMIN</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

@push('scripts')
    @include('datatables.datatables-js')
@endpush