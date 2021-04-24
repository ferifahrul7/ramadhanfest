<script>
    $(document).ready(function() {
        $('#grup').hide();
        $('#tambah_pengunjung').hide();
        $('input[name=jenis_pengunjung]').on('change', function() {
            setForm();
        })

        $('#btn_daftar').on('click', function() {
            let url = "{{ route('pendaftaran.store') }}";
            let method = 'post';
            $.ajax({
                url: url,
                method: method,
                data: $('.form-input').serialize(),
                dataType: "json",
                success: function(data) {
                    // alert('xx');
                    if (data.status == 'success') {
                        alert('kode anda adalah :'+data.kode)
                    }
                },
                error: function(xhr) {
                    $('.error-input').text('');
                    console.log(typeof(xhr.responseJSON));
                    if (typeof(xhr.responseJSON) == 'object') {
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            let k = key.replace(/\./g, '_');

                            $('#err-' + k).addClass('text-danger').text(value);
                            // $('#err-' + k).show();
                        });
                    }
                },
            })
        })

        $('#btn_tambah_pengunjung').on('click', function(e) {
            e.preventDefault();
            let i = $(this).val();
            // let htmlappend = '<div class="grup_form_0"> <hr class="my-2"> <h4 class="text-center">Pengunjung lain</h4> <div class="form-row"> <div class="col-md-12 form-group"> <label for="">Nama</label> <span class="text-danger">*</span> <input type="text" name="grup[' + i + '][nama_peserta]" data-name="nama_peserta" class="form-control" id="nama_peserta" placeholder="Nama Lengkap"/> <div id="err-grup_' + i + '_nama_peserta" class="error-input"></div> </div> <div class="col-md-6 form-group"> <label for="nik">NIK</label> <input type="nik" class="form-control" name="grup[' + i + '][nik]" id="nik" placeholder="NIK" data-rule="required;minlen:16" data-msg="Mohon isi nik dengan benar." /> <div id="err-grup_' + i + '_nik" class="error-input"></div> </div> </div> <div class="form-group"> <label for="alamat">Alamat</label> <span class="text-danger">*</span> <textarea class="form-control" name="grup[' + i + '][alamat]" id="alamat" rows="5" placeholder="Ketik Alamat"></textarea> <div id="err-grup_' + i + '_alamat" class="error-input"></div> </div> <div class="form-group"> <label for="hp">No. Handphone</label> <span class="text-danger">*</span> <input type="text" class="form-control" name="grup[' + i + '][hp]" id="hp" placeholder="08xxxxxxxxx" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" /> <small class="text-secondary">Nomor hp diawali dengan 0</small> <div id="err-grup_' + i + '_hp" class="error-input"></div> </div> </div>';
            let htmlappend = '<div class="grup_form_0"> <hr class="my-2"> <h4 class="text-center">Pengunjung lain</h4> <div class="form-row"> <div class="col-md-12 form-group"> <label for="">Nama</label> <span class="text-danger">*</span> <input type="text" name="grup[' + i + '][nama_peserta]" data-name="nama_peserta" class="form-control" id="nama_peserta" placeholder="Nama Lengkap"/> <div id="err-grup_' + i + '_nama_peserta" class="error-input"></div> </div> </div> <div class="form-group"> <label for="alamat">Alamat</label> <span class="text-danger">*</span> <textarea class="form-control" name="grup[' + i + '][alamat]" id="alamat" rows="5" placeholder="Ketik Alamat"></textarea> <div id="err-grup_' + i + '_alamat" class="error-input"></div> </div> <div class="form-group"> <label for="hp">No. Handphone</label> <span class="text-danger">*</span> <input type="text" class="form-control" name="grup[' + i + '][hp]" id="hp" placeholder="08xxxxxxxxx" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" /> <small class="text-secondary">Nomor hp diawali dengan 0</small> <div id="err-grup_' + i + '_hp" class="error-input"></div> </div> </div>';
            $('.grup-block').append(htmlappend);
            $(this).val((i * 1) + 1);
        });

        function setForm() {
            let jenis_pengunjung_val = $('input[name=jenis_pengunjung]:checked').val();
            console.log(jenis_pengunjung_val);
            if (jenis_pengunjung_val == 'grup') {
                $('#grup').show();
                $('#tambah_pengunjung').show();
            } else {
                $('#grup').hide();
                $('#tambah_pengunjung').hide();
            }
            // return false;
        }
    })
</script>