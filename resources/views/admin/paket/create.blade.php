<form action="{{ route('admin.paket.store') }}" class="modal-form" method="POST">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title">Tambah Paket</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="alert alert-danger">
            <i>
                Input dengan tanda&nbsp;<span class="text-danger">*</span>&nbsp;Wajib diisi!
            </i>
        </div>
        <div class="mb-3">
            <label class="form-label required" for="nama">Nama Paket</label>
            <input type="text" class="form-control" name="nama" id="nama">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="harga">Harga</label>
            <input type="number" class="form-control" name="harga" id="harga">
        </div>
        <div class="mb-3">
            <label class="form-label" for="diskon">Diskon</label>
            <input type="number" class="form-control" name="diskon" id="diskon">
        </div>
        <div class="mb-3">
            <label class="form-label" for="diskon">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary ms-auto btn-submit">Simpan</button>
    </div>
</form>
<script>
    ClassicEditor
        .create(document.querySelector('#deskripsi'), {
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    '|',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'insertTable',
                    '|',
                    'undo',
                    'redo'
                ]
            },
        })
        .catch(error => {
            console.error(error);
        });
</script>
