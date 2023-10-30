@extends('web.layouts.main')

@section('title', 'Paket')

@section('content')
    <main id="main">

        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Paket</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Paket</li>
                    </ol>
                </div>

            </div>
        </section>

        <section id="pricing" class="pricing">
            <div class="container">
                <div class="row">
                    @foreach ($pakets as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="box {{ $item->diskon > 0 ? 'featured' : '' }}">
                                <h3>{{ $item->nama }}</h3>
                                <h4>
                                    <sup>Rp</sup>
                                    {{ number_format($item->harga - ($item->harga * $item->diskon) / 100, 0, ',', '.') }}
                                </h4>
                                @if ($item->diskon > 0)
                                    <ul>
                                        <li class="na">
                                            Rp. {{ number_format($item->harga, 0, ',', '.') }}
                                        </li>
                                    </ul>
                                @endif
                                {!! $item->deskripsi !!}
                                <div class="btn-wrap">
                                    <a href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202."
                                        class="btn-buy" target="_blank">Ambil</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="col-lg-4 col-md-6">
                        <div class="box">
                            <h3>The Day Only</h3>
                            <h4><sup>Rp</sup>3.500.000</h4>
                            <ul>
                                <li class="na">Rp. 7.000.000</li>
                                <li>3 Profesional Crew</li>
                                <li>Durasi Kerja 3 Jam Acara</li>
                                <li>Organisir Saat Hari H</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Ambil</a>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
                        <div class="box featured">
                            <h3>The Organizer</h3>
                            <h4><sup>Rp</sup>10.000.000</h4>
                            <ul>
                                <li class="na">Rp. 13.000.000</li>
                                <li>6 Profesional Crew</li>
                                <li>Durasi Kerja 4 Jam Acara</li>
                                <li>Membuat Rundown Acara</li>
                                <li>Mengatur Dan Mendampingi Technical Meeting Keluarga</li>
                                <li>Mengatur Dan Mendampingi Technical Meeting Vendor</li>
                                <li>Mempersiapkan Text-Text Kebutuhan Acara</li>
                                <li>Mempersiapkan Signage - Signage Kebutuhan Acara</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Ambil</a>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                        <div class="box">
                            <h3>The Planner</h3>
                            <h4><sup>Rp</sup>25.000.000</h4>
                            <ul>
                                <li class="na">Rp. 37.000.000</li>
                                <li>Membuat Konsep Acara, Timeline Kerja, Detail Checklist & Budgeting Acara</li>
                                <li>Memberikan Laporan Progres Acara Setiap Minggu</li>
                                <li>Dealing Dan Negosiasi Kepada Vendor</li>
                                <li>Mendampingi Calon Pengantin Saat Mempersiapkan Kebutuhan Acar</li>
                                <li>Membuat Laporan Detail Akhir Acara</li>
                                <li>6 Profesional Crew</li>
                                <li>Durasi Kerja 4 Jam Acara</li>
                                <li>Membuat Rundown Acara</li>
                                <li>Mengatur Dan Mendampingi Technical Meeting Keluarga</li>
                                <li>Mengatur Dan Mendampingi Technical Meeting Vendor</li>
                                <li>Mempersiapkan Text-Text Kebutuhan Acara</li>
                                <li>Mempersiapkan Signage - Signage Kebutuhan Acara</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Ambil</a>
                            </div>
                        </div>
                    </div> --}}

                </div>

            </div>
        </section>

    </main>
@endsection
