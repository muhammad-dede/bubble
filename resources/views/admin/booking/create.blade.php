<form action="{{ route('admin.booking.store') }}" class="modal-form" method="POST">
    @csrf
    @method('post')
    <div class="modal-header">
        <h5 class="modal-title">Tambah Booking</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="alert alert-danger">
            <i>
                Input dengan tanda&nbsp;<span class="text-danger">*</span>&nbsp;Wajib diisi!
            </i>
        </div>
        <div class="mb-3">
            <label class="form-label required" for="no_booking">No Booking</label>
            <input type="text" class="form-control" name="no_booking" id="no_booking" readonly
                value="{{ $no_booking }}">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="id_user">Client</label>
            <select class="form-select" name="id_user" id="id_user">
                <option selected value=""></option>
                @foreach ($clients as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
            <small class="form-hint">
                Jika data client belum ada, tambahkan di menu Client!
            </small>
        </div>
        <div class="mb-3">
            <label class="form-label required" for="id_paket">Paket</label>
            <select class="form-select" name="id_paket" id="id_paket">
                <option selected value=""></option>
                @foreach ($pakets as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
            <small class="form-hint">
                Jika data paket belum ada, tambahkan di menu Paket!
            </small>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary ms-auto btn-submit">Simpan</button>
    </div>
</form>
