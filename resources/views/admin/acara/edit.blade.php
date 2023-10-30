<form action="{{ route('admin.acara.update', $acara->id) }}" class="modal-form" method="POST">
    @csrf
    @method('put')
    <div class="modal-header">
        <h5 class="modal-title">Ubah Acara</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="alert alert-danger">
            <i>
                Input dengan tanda&nbsp;<span class="text-danger">*</span>&nbsp;Wajib diisi!
            </i>
        </div>
        <input type="hidden" name="id_booking" value="{{ $acara->booking->id }}">
        <div class="mb-3">
            <label class="form-label required" for="no_booking">No Booking</label>
            <input type="text" class="form-control" name="no_booking" id="no_booking" readonly
                value="{{ $acara->booking->no_booking }}">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="tanggal_acara">Tanggal Acara</label>
            <input type="date" class="form-control" name="tanggal_acara" id="tanggal_acara"
                value="{{ $acara->tanggal_acara }}">
        </div>
        <hr>
        <div class="mb-3">
            <label class="form-label required" for="nama_pengantin_pria">Nama Pengantin Pria</label>
            <input type="text" class="form-control" name="nama_pengantin_pria" id="nama_pengantin_pria"
                value="{{ $acara->nama_pengantin_pria }}">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="tempat_lahir_pengantin_pria">Tempat Lahir Pengantin Pria</label>
            <input type="text" class="form-control" name="tempat_lahir_pengantin_pria"
                id="tempat_lahir_pengantin_pria" value="{{ $acara->tempat_lahir_pengantin_pria }}">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="tanggal_lahir_pengantin_pria">Tanggal Lahir Pengantin Pria</label>
            <input type="date" class="form-control" name="tanggal_lahir_pengantin_pria"
                id="tanggal_lahir_pengantin_pria" value="{{ $acara->tanggal_lahir_pengantin_pria }}">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="pengantin_pria_anak_ke">Pengantin Pria Anak Ke</label>
            <input type="number" class="form-control" name="pengantin_pria_anak_ke" id="pengantin_pria_anak_ke"
                value="{{ $acara->pengantin_pria_anak_ke }}">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="nama_ayah_pengantin_pria">Nama Ayah Pengantin Pria</label>
            <input type="text" class="form-control" name="nama_ayah_pengantin_pria" id="nama_ayah_pengantin_pria"
                value="{{ $acara->nama_ayah_pengantin_pria }}">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="nama_ibu_pengantin_pria">Nama Ibu Pengantin Pria</label>
            <input type="text" class="form-control" name="nama_ibu_pengantin_pria" id="nama_ibu_pengantin_pria"
                value="{{ $acara->nama_ibu_pengantin_pria }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Saudara Pengantin Pria (Optional)</label>
            <input type="text" class="form-control mb-2" name="nama_saudara_pengantin_pria_1"
                id="nama_saudara_pengantin_pria_1" value="{{ $acara->nama_saudara_pengantin_pria_1 }}">
            <input type="text" class="form-control" name="nama_saudara_pengantin_pria_2"
                id="nama_saudara_pengantin_pria_2" value="{{ $acara->nama_saudara_pengantin_pria_2 }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="alamat_pengantin_pria">Alamat Pengantin Pria</label>
            <input type="text" class="form-control" name="alamat_pengantin_pria" id="alamat_pengantin_pria"
                value="{{ $acara->alamat_pengantin_pria }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="telepon_pengantin_pria">Telepon Pengantin Pria</label>
            <input type="number" class="form-control" name="telepon_pengantin_pria" id="telepon_pengantin_pria"
                value="{{ $acara->telepon_pengantin_pria }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="email_pengantin_pria">Email Pengantin Pria</label>
            <input type="text" class="form-control" name="email_pengantin_pria" id="email_pengantin_pria"
                value="{{ $acara->email_pengantin_pria }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="pekerjaan_pengantin_pria">Pekerjaan Pengantin Pria</label>
            <input type="text" class="form-control" name="pekerjaan_pengantin_pria" id="pekerjaan_pengantin_pria"
                value="{{ $acara->pekerjaan_pengantin_pria }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="instagram_pengantin_pria">Instagram Pengantin Pria (Optional)</label>
            <input type="text" class="form-control" name="instagram_pengantin_pria" id="instagram_pengantin_pria"
                value="{{ $acara->instagram_pengantin_pria }}">
        </div>
        <hr>
        <div class="mb-3">
            <label class="form-label required" for="nama_pengantin_wanita">Nama Pengantin Wanita</label>
            <input type="text" class="form-control" name="nama_pengantin_wanita" id="nama_pengantin_wanita"
                value="{{ $acara->nama_pengantin_wanita }}">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="tempat_lahir_pengantin_wanita">Tempat Lahir Pengantin
                Wanita</label>
            <input type="text" class="form-control" name="tempat_lahir_pengantin_wanita"
                id="tempat_lahir_pengantin_wanita" value="{{ $acara->tempat_lahir_pengantin_wanita }}">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="tanggal_lahir_pengantin_wanita">Tanggal Lahir Pengantin
                Wanita</label>
            <input type="date" class="form-control" name="tanggal_lahir_pengantin_wanita"
                id="tanggal_lahir_pengantin_wanita" value="{{ $acara->tanggal_lahir_pengantin_wanita }}">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="pengantin_wanita_anak_ke">Pengantin Wanita Anak Ke</label>
            <input type="number" class="form-control" name="pengantin_wanita_anak_ke" id="pengantin_wanita_anak_ke"
                value="{{ $acara->pengantin_wanita_anak_ke }}">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="nama_ayah_pengantin_wanita">Nama Ayah Pengantin Wanita</label>
            <input type="text" class="form-control" name="nama_ayah_pengantin_wanita"
                id="nama_ayah_pengantin_wanita" value="{{ $acara->nama_ayah_pengantin_wanita }}">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="nama_ibu_pengantin_wanita">Nama Ibu Pengantin Wanita</label>
            <input type="text" class="form-control" name="nama_ibu_pengantin_wanita"
                id="nama_ibu_pengantin_wanita" value="{{ $acara->nama_ibu_pengantin_wanita }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Saudara Pengantin Wanita (Optional)</label>
            <input type="text" class="form-control mb-2" name="nama_saudara_pengantin_wanita_1"
                id="nama_saudara_pengantin_wanita_1" value="{{ $acara->nama_saudara_pengantin_wanita_1 }}">
            <input type="text" class="form-control" name="nama_saudara_pengantin_wanita_2"
                id="nama_saudara_pengantin_wanita_2" value="{{ $acara->nama_saudara_pengantin_wanita_2 }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="alamat_pengantin_wanita">Alamat Pengantin Wanita</label>
            <input type="text" class="form-control" name="alamat_pengantin_wanita" id="alamat_pengantin_wanita"
                value="{{ $acara->alamat_pengantin_wanita }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="telepon_pengantin_wanita">Telepon Pengantin Wanita</label>
            <input type="number" class="form-control" name="telepon_pengantin_wanita" id="telepon_pengantin_wanita"
                value="{{ $acara->telepon_pengantin_wanita }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="email_pengantin_wanita">Email Pengantin Wanita</label>
            <input type="text" class="form-control" name="email_pengantin_wanita" id="email_pengantin_wanita"
                value="{{ $acara->email_pengantin_wanita }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="pekerjaan_pengantin_wanita">Pekerjaan Pengantin Wanita</label>
            <input type="text" class="form-control" name="pekerjaan_pengantin_wanita"
                id="pekerjaan_pengantin_wanita" value="{{ $acara->pekerjaan_pengantin_wanita }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="instagram_pengantin_wanita">Instagram Pengantin Wanita (Optional)</label>
            <input type="text" class="form-control" name="instagram_pengantin_wanita"
                id="instagram_pengantin_wanita" value="{{ $acara->instagram_pengantin_wanita }}">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary ms-auto btn-submit">Simpan</button>
    </div>
</form>
