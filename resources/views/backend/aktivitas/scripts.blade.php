<script>
    
    var table = $('#tabel-aktivitas').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        scrollX: true,
        ajax: '/admin/aktivitas-pengunjung-ajax',
        columns: [{
                data: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'peserta.nama_peserta',
                name: 'peserta.nama_peserta'
            },
            {
                data: 'waktu_masuk',
                name: 'waktu_masuk'
            },
            {
                data: 'waktu_keluar',
                name: 'waktu_keluar'
            },
            {
                data: 'transaksi.kode_transaksi',
                name: 'transaksi.kode_transaksi'
            },
        ],
        "language": {
            "lengthMenu": "_MENU_ ",
            "info": "<button type='button' class='btn btn-primary'> Total : <span class='badge badge-transparent'> _END_</span> dari <span class='badge badge-transparent'> _TOTAL_</span> Data</button>",
            "search": "Search Data :  ",
            "dom": "<t<p >>",
            "zeroRecords": "Tidak ada data",
            "search": "<div class='mr-2 mt-2'> _INPUT_ </div>",
            "infoFiltered": "",
            "searchPlaceholder": "Cari...",
            "infoEmpty": "Data tidak tersedia",
        },
        "bSortClasses": false,
        "pageLength": 25
    });


    var buttons = new $.fn.dataTable.Buttons(table, {
        buttons: [{
                text: '<i class="fas fa-file-pdf"></i> pdf',
                className: 'btn btn-danger',
                extend: 'pdf',
                title: '',
                messageTop: 'Data Aktivitas Pengunjung',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible'
                },
            },
            {
                text: '<i class="fas fa-file-excel"></i> xls',
                className: 'btn btn-success',
                extend: 'excel',
                title: '',
                messageTop: 'Data Aktivitas Pengunjung',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible'
                },
            },
            {
                text: '<i class="fas fa-print"></i> print',
                className: 'btn btn-warning',
                extend: 'print',
                title: '',
                messageTop: 'Data Aktivitas Pengunjung',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible'
                },
            },
            {
                text: '<i class="fas fa-table"></i> visibitas kolom',
                className: 'btn btn-primary',
                extend: 'colvis',
                postfixButtons: [
                    'colvisRestore'
                ]
            },
        ]
    }).container().appendTo($('#buttons'));

</script>