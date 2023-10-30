<div class="modal-header">
    <h5 class="modal-title">Detail Paket</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="mb-2">
        <strong>Nama Paket</strong>
        <br>
        <span>{{ $paket->nama }}</span>
    </div>
    <div class="hr"></div>
    <div class="mb-2">
        <strong>Harga</strong>
        <br>
        <span>Rp. {{ $paket->harga }}</span>
    </div>
    <div class="hr"></div>
    <div class="mb-2">
        <strong>Diskon</strong>
        <br>
        <span>{{ $paket->diskon }}%</span>
    </div>
    <div class="hr"></div>
    <div class="mb-2">
        <strong>Deskripsi</strong>
        <br>
        {!! $paket->deskripsi !!}
    </div>
</div>
