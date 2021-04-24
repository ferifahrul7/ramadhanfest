<section id="contact" class="mt-4 contact section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Pendaftaran</h2>
            <p>Daftarkan diri untuk mendapatkan kode secara otomatis</p>
        </div>

        <div class="col-lg-6 mt-4 mt-md-0 pendaftaran">
            <form action="{{ route('pendaftaran.store') }}" method="post" role="form" class="form-input">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" id="n_grup" value="0">
                <div class="form-group">
                    <div class="text-center">
                        <label for=""> Jenis Pengunjung </label>
                        <br>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active">
                                <input type="radio" name="jenis_pengunjung" value="personal" id="jenis_pengunjung0" autocomplete="off" checked> Personal
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="jenis_pengunjung" value="grup" id="jenis_pengunjung1" autocomplete="off"> Grup
                            </label>
                        </div>

                    </div>
                </div>
                <div id="personal">
                    <div class="form-row">
                        <div class="col-md-12 form-group">
                            <label for="nama_peserta">Nama</label> <span class="text-danger">*</span>
                            <input type="text" name="nama_peserta" class="form-control"  placeholder="Nama Lengkap" data-rule="required" data-msg="Mohon Isi Kolom Ini" />
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="nik">NIK</label> <span class="text-danger">*</span>
                            <input type="nik" class="form-control" name="nik"  placeholder="NIK" data-rule="required;minlen:16" data-msg="Mohon isi nik dengan benar." />
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label> <span class="text-danger">*</span>
                        <textarea class="form-control" name="alamat" rows="5" data-rule="required" data-msg="Mohon Isi Alamat Lengkap" placeholder="Ketik Alamat"></textarea>
                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <label for="hp">No. Handphone</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control" name="hp" placeholder="08xxxxxxxxx" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                        <small class="text-secondary">Nomor hp diawali dengan 0</small>
                        <div class="validate"></div>
                    </div>
                </div>
                <div class="grup-block">

                </div>
                <div id="tambah_pengunjung">
                    <button value="0" type="button" class="btn btn-success" id="btn_tambah_pengunjung">
                        <i class="bx-bx-plus"></i> Tambah pengunjung
                    </button>
                </div>

                <div class="text-center"><button type="submit" class="btn btn-primary">Daftar</button></div>

            </form>
            
        </div>
    </div>
</section>