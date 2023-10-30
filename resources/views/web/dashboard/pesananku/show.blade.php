@extends('web.layouts.user.main')

@section('title', 'Detail PesananKu')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Detail PesananKu
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card card-lg">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="h3">Pengantin Pria</p>
                            <table>
                                <tr>
                                    <td>Nama</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->nama_pengantin_pria }}</td>
                                </tr>
                                <tr>
                                    <td>Tempat, Tanggal Lahir</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->tempat_lahir_pengantin_pria }},
                                        {{ $booking->acara->tanggal_lahir_pengantin_pria }}</td>
                                </tr>
                                <tr>
                                    <td>Anak Ke</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->pengantin_pria_anak_ke }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Ayah</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->nama_ayah_pengantin_pria }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Ibu</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->nama_ibu_pengantin_pria }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Ibu</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->nama_ibu_pengantin_pria }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Saudara</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->nama_saudara_pengantin_pria_1 }}
                                        {{ $booking->acara->nama_saudara_pengantin_pria_2 != null ? ' ,' . $booking->acara->nama_saudara_pengantin_pria_2 : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->alamat_pengantin_pria }}</td>
                                </tr>
                                <tr>
                                    <td>Telepon</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->telepon_pengantin_pria }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->email_pengantin_pria }}</td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->pekerjaan_pengantin_pria }}</td>
                                </tr>
                                <tr>
                                    <td>Instagram</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->instagram_pengantin_pria }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-6">
                            <p class="h3">Pengantin Wanita</p>
                            <table>
                                <tr>
                                    <td>Nama</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->nama_pengantin_wanita }}</td>
                                </tr>
                                <tr>
                                    <td>Tempat, Tanggal Lahir</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->tempat_lahir_pengantin_wanita }},
                                        {{ $booking->acara->tanggal_lahir_pengantin_wanita }}</td>
                                </tr>
                                <tr>
                                    <td>Anak Ke</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->pengantin_wanita_anak_ke }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Ayah</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->nama_ayah_pengantin_wanita }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Ibu</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->nama_ibu_pengantin_wanita }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Ibu</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->nama_ibu_pengantin_wanita }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Saudara</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->nama_saudara_pengantin_wanita_1 }}
                                        {{ $booking->acara->nama_saudara_pengantin_wanita_2 != null ? ' ,' . $booking->acara->nama_saudara_pengantin_wanita_2 : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->alamat_pengantin_wanita }}</td>
                                </tr>
                                <tr>
                                    <td>Telepon</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->telepon_pengantin_wanita }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->email_pengantin_wanita }}</td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->pekerjaan_pengantin_wanita }}</td>
                                </tr>
                                <tr>
                                    <td>Instagram</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $booking->acara->instagram_pengantin_wanita }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-12 my-4">
                            <h1>No Booking {{ $booking->acara->booking->no_booking }}</h1>
                        </div>
                    </div>
                    <table class="table table-transparent table-responsive">
                        <thead>
                            <tr>
                                <th>Paket</th>
                                <th class="text-end" style="width: 15%">Harga</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>
                                <p class="strong">{{ $booking->acara->booking->paket->nama }}</p>
                            </td>
                            <td class="text-end">Rp.
                                {{ number_format($booking->acara->booking->paket->harga - ($booking->acara->booking->paket->harga * $booking->acara->booking->paket->diskon) / 100, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold text-uppercase text-end">Total</td>
                            <td class="font-weight-bold text-end">Rp.
                                {{ number_format($booking->acara->booking->paket->harga - ($booking->acara->booking->paket->harga * $booking->acara->booking->paket->diskon) / 100, 0, ',', '.') }}
                            </td>
                        </tr>
                    </table>
                    <p class="text-muted text-center mt-5">Thank you very much for doing business with us. We
                        look forward to working with
                        you again!</p>
                </div>
            </div>
        </div>
    </div>
@endsection
