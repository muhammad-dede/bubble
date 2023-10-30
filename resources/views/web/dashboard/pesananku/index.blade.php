@extends('web.layouts.user.main')

@section('title', 'PesananKu')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        PesananKu
                    </h2>
                </div>
                {{-- <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <a href="{{ route('admin.booking.create') }}" class="btn btn-primary btn-modal-show">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            {{ __('Tambah') }}
                        </a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <div id="table-default" class="table-responsive">
                        <table class="table table-vcenter" id="dataTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="w-1">No</th>
                                    <th>No Booking</th>
                                    <th>Paket</th>
                                    <th>Harga</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Keterangan</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                @foreach ($data_booking as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->no_booking }}</td>
                                        <td>{{ $item->paket->nama }}</td>
                                        <td>{{ number_format($item->paket->harga, 0, ',', '.') }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            @if ($item->status == 0)
                                                Admin Belum Konfirmasi Pesanan
                                            @elseif ($item->status == 1)
                                                <span class="text-primary">Admin melengkapi data Acara</span>
                                            @else
                                                <a href="{{ route('pesananku.show', $item->id) }}"
                                                    class="text-success">Detail</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202."
                                                target="_blank">
                                                Hubungi Admin
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
