<script>
    "use strict"
    $(document).ready(function() {
        $('#grup').hide();
        $('#tambah_pengunjung').hide();
        $('input[name=jenis_pengunjung]').on('change', function() {
            setForm();
        })
        // $('#btn_tambah_pengunjun').click(function() {
        //     var clone = $('.grup_form_0').clone('.grup_form_0').show().removeClass('grup_form_0');

        //     $('.grup-block').append(clone);
        // });

        $('#btn_tambah_pengunjung').on('click', function(e) {
            e.preventDefault();
            let i = $(this).val();
            let htmlappend = '<div class="grup_form_0"> <hr class="my-2"> <h4 class="text-center">Pengunjung lain</h4> <div class="form-row"> <div class="col-md-12 form-group"> <label for="">Nama</label> <span class="text-danger">*</span> <input type="text" name="grup[' + i + '][nama_peserta]" data-name="nama_peserta" class="form-control" id="nama_peserta" placeholder="Nama Lengkap" data-rule="required" data-msg="Mohon Isi Kolom Ini" /> <div class="validate"></div> </div> <div class="col-md-6 form-group"> <label for="nik">NIK</label> <input type="nik" class="form-control" name="grup[' + i + '][nik]" id="nik" placeholder="NIK" data-rule="required;minlen:16" data-msg="Mohon isi nik dengan benar." /> <div class="validate"></div> </div> </div> <div class="form-group"> <label for="alamat">Alamat</label> <span class="text-danger">*</span> <textarea class="form-control" name="grup[' + i + '][alamat]" id="alamat" rows="5" data-rule="required" data-msg="Mohon Isi Alamat Lengkap" placeholder="Ketik Alamat"></textarea> <div class="validate"></div> </div> <div class="form-group"> <label for="hp">No. Handphone</label> <span class="text-danger">*</span> <input type="text" class="form-control" name="grup[' + i + '][hp]" id="hp" placeholder="08xxxxxxxxx" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" /> <small class="text-secondary">Nomor hp diawali dengan 0</small> <div class="validate"></div> </div> </div>';
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