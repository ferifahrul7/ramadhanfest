<script>
    $('#btn-cek-pengunjung').on('click', function() {
        clearForm();
        cekKode();
    })
    $(".form-input").submit(function(e) {
        e.preventDefault();
        clearForm();
        cekKode();
    });

    function cekKode() {
        let url = "{{ route('entry.search') }}";
        let method = 'POST';
        $.ajax({
            url: url,
            method: method,
            data: {
                'kode_pengunjung': $('#kode_pengunjung').val()
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                if (data.status == 'success') {
                    $('#pengunjung-ada').show();
                    setHeader(data);
                    setTableDetail(data);
                }else{
                    $('#pengunjung-ada').hide();
                    $('#err-kode_pengunjung').text(data.message).addClass('text-danger');
                }
            },
            error: function(xhr) {
                $('.error-input').text('');
                if (typeof(xhr.responseJSON) == 'object') {
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        let k = key.replace(/\./g, '_');
                        $('#err-' + k).addClass('text-danger').text(value);
                    });
                }
            },
        })
    }

    function clearForm()
    {
        $('#jenis_pengunjung').text('');
        $('#jumlah_pengunjung').text('');
        $('#err-kode_pengunjung').text('');
        $('#kode_transaksi').val('');
        
        $('#tabel-detail').DataTable().destroy();
        return false;
    }

    function setHeader(data) {
        $('#jenis_pengunjung').text(data.jenis_pengunjung);
        $('#jumlah_pengunjung').text(data.jumlah_peserta);
        $('#kode_transaksi').val(data.kode_transaksi);
        return false;
    }

    function setTableDetail(params) {
        let url = "{{ route('transaksi-detail.get') }}";
        let table = $('#tabel-detail').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            scrollX: true,
            ajax: {
                url: url,
                type: 'POST',
                data: {
                    kode: $('#kode_pengunjung').val()
                },
            },
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
                    data: 'peserta.nik',
                    name: 'peserta.nik'
                },
                {
                    data: 'peserta.alamat',
                    name: 'peserta.alamat'
                },
                {
                    data: 'peserta.hp',
                    name: 'peserta.hp'
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
            "bLengthChange": false,
            "bInfo": false,
            "paging": false,
            "bSortClasses": false,
        });

        return false;
    }
</script>