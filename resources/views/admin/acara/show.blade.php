@extends('admin.layouts.main')

@section('content')
    <div class="page-wrapper">
        <div class="container-xl">
            <div class="page-header d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Detail Acara
                        </h2>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                <rect x="7" y="13" width="10" height="8" rx="2" />
                            </svg>
                            Print
                        </button>
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
                                        <td>{{ $acara->nama_pengantin_pria }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tempat, Tanggal Lahir</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $acara->tempat_lahir_pengantin_pria }},
                                            {{ $acara->tanggal_lahir_pengantin_pria }}</td>
                                    </tr>
                                    <tr>
                                        <td>Anak Ke</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $acara->pengantin_pria_anak_ke }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Ayah</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $acara->nama_ayah_pengantin_pria }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Ibu</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $acara->nama_ibu_pengantin_pria }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Ibu</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $acara->nama_ibu_pengantin_pria }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Saudara</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $acara->nama_saudara_pengantin_pria_1 }}
                                            {{ $acara->nama_saudara_pengantin_pria_2 != null ? ' ,' . $acara->nama_saudara_pengantin_pria_2 : '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $acara->alamat_pengantin_pria }}</td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $acara->telepon_pengantin_pria }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $acara->email_pengantin_pria }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pekerjaan</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $acara->pekerjaan_pengantin_pria }}</td>
                                    </tr>
                                    <tr>
                                        <td>Instagram</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $acara->instagram_pengantin_pria }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-6">
                                <p class="h3">Pengantin Wanita</p>
                                <table>
                                    <tr>
                                        <td>Nama</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $acara->nama_pengantin_wanita }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tempat, Tanggal Lahir</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $acara->tempat_lahir_pengantin_wanita }},
                                            {{ $acara->tanggal_lahir_pengantin_wanita }}</td>
                                    </tr>
                                    <tr>
                                        <td>Anak Ke</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $acara->pengantin_wanita_anak_ke }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Ayah</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $acara->nama_ayah_pengantin_wanita }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Ibu</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $acara->nama_ibu_pengantin_wanita }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Ibu</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $acara->nama_ibu_pengantin_wanita }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Saudara</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $acara->nama_saudara_pengantin_wanita_1 }}
                                            {{ $acara->nama_saudara_pengantin_wanita_2 != null ? ' ,' . $acara->nama_saudara_pengantin_wanita_2 : '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $acara->alamat_pengantin_wanita }}</td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $acara->telepon_pengantin_wanita }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $acara->email_pengantin_wanita }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pekerjaan</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $acara->pekerjaan_pengantin_wanita }}</td>
                                    </tr>
                                    <tr>
                                        <td>Instagram</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>{{ $acara->instagram_pengantin_wanita }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 my-4">
                                <h1>No Booking {{ $acara->booking->no_booking }}</h1>
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
                                    <p class="strong">{{ $acara->booking->paket->nama }}</p>
                                </td>
                                <td class="text-end">Rp.
                                    {{ number_format($acara->booking->paket->harga - ($acara->booking->paket->harga * $acara->booking->paket->diskon) / 100, 0, ',', '.') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-uppercase text-end">Total</td>
                                <td class="font-weight-bold text-end">Rp.
                                    {{ number_format($acara->booking->paket->harga - ($acara->booking->paket->harga * $acara->booking->paket->diskon) / 100, 0, ',', '.') }}
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
    </div>
@endsection
