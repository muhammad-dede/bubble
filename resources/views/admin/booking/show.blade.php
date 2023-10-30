<div class="modal-header">
    <h5 class="modal-title">Detail Booking</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="mb-2">
        <strong>No Booking</strong>
        <br>
        <span>{{ $booking->no_booking }}</span>
    </div>
    <div class="hr"></div>
    <div class="mb-2">
        <strong>Client</strong>
        <br>
        <span>{{ $booking->user->name }}</span>
    </div>
    <div class="hr"></div>
    <div class="mb-2">
        <strong>Paket</strong>
        <br>
        <span>{{ $booking->paket->nama }}</span>
    </div>
    <div class="hr"></div>
    <div class="mb-2">
        <strong>Total Harga</strong>
        <br>
        <span>Rp. {{ $booking->total_harga }}</span>
    </div>
    <div class="hr"></div>
    <div class="mb-2">
        <strong>Status</strong>
        <br>
        <span>{{ $booking->status == 0 ? 'Belum Konfirmasi' : 'Sepakat' }}</span>
    </div>
</div>
