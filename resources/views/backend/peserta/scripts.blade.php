<script>
    var table = $('#tabel-peserta').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        scrollX: true,
        ajax: '/admin/peserta-ajax',
        columns: [{
                data: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'nama_peserta',
                name: 'nama_peserta'
            },
            {
                data: 'nik',
                name: 'nik'
            },
            {
                data: 'alamat',
                name: 'alamat'
            },
            {
                data: 'hp',
                name: 'hp'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
                className: 'not-exported'
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
                messageTop: 'Data Peserta',
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
                messageTop: 'Data Peserta',
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
                messageTop: 'Data Peserta',
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


    $(document).on('click', '#delete', function() {
        var id = $(this).data('idx'),
            name = $(this).data('name');

        swalWithBootstrapButtons.fire({
            title: 'Anda yakin akan menghapus data??',
            text: "Data: " + name,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'No',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                ajaxDestroy(id);
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire('Dibatalkan', 'Data peserta terpilih batal di hapus :)', 'error')
            }
        })
    })

    function ajaxDestroy(idx) {
        var url = '/admin/ajax/peserta/destroy',
            method = 'DELETE';

        $.ajax({
            url: url,
            method: method,
            data: {
                idx: idx
            },
            success: function(res) {

                if (res.code !== 200) {
                    swalWithBootstrapButtons.fire('Lapor!', res.message + ' ' + res.result.total + ' registrasi', 'info');
                } else {
                    swalWithBootstrapButtons.fire('Lapor!', res.message + '\nnama : ' + res.result.nama, 'success');
                }
                $('#tabel-peserta').DataTable().ajax.reload();
            },
            error: function(xhr) {}
        });
    }

    function createData() {
        $(".modal-title").html("Tambah Data Peserta");
        $("#saveData").val("add");
        $("#saveData").html('<i class="fa fa-save"></i> Simpan');
        $("#formModal").modal("show");
    }
</script>