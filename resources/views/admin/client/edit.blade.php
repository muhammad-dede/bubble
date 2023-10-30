<form action="{{ route('admin.client.update', $client->id) }}" class="modal-form" method="POST">
    @csrf
    @method('PUT')
    <div class="modal-header">
        <h5 class="modal-title">Edit Client</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="alert alert-danger">
            <i>
                Input dengan tanda&nbsp;<span class="text-danger">*</span>&nbsp;Wajib diisi!
            </i>
        </div>
        <div class="mb-3">
            <label class="form-label required" for="name">Nama</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $client->name }}">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{ $client->email }}">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="phone">Telepon</label>
            <input type="text" class="form-control" name="phone" id="phone" value="{{ $client->phone }}">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary ms-auto btn-submit">Simpan</button>
    </div>
</form>
