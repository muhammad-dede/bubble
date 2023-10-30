@extends('web.layouts.main')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url({{ asset('') }}images/carousel-1.jpg)">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">Wedding Organizer <span>(BUBBLE WO)</span>
                            </h2>
                            <p class="animate__animated animate__fadeInUp">
                                Make Your Special Wedding Be Exclusive.
                            </p>
                            <a href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202."
                                class="btn-get-started animate__animated animate__fadeInUp scrollto" target="_blank">
                                Ambil Sekarang
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item" style="background-image: url({{ asset('') }}images/carousel-2.jpg)">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">Wedding Organizer <span>(BUBBLE WO)</span>
                            </h2>
                            <p class="animate__animated animate__fadeInUp">
                                Percayakan dan konsultasikan pernikahan impian kamu kepada Bubble Wedding Organizer
                            </p>
                            <a href="{{ route('paket') }}"
                                class="btn-get-started animate__animated animate__fadeInUp scrollto">
                                Ambil Sekarang
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item" style="background-image: url({{ asset('') }}images/carousel-3.jpg)">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">Wedding Organizer <span>(BUBBLE WO)</span>
                            </h2>
                            <p class="animate__animated animate__fadeInUp">
                                Wujudkan Acara Sesuai Yang Kamu Inginkan
                            </p>
                            <a href="{{ route('paket') }}"
                                class="btn-get-started animate__animated animate__fadeInUp scrollto">
                                Ambil Sekarang
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row content">
                    {{-- <div class="col-lg-6">
                        <h2>Eum ipsam laborum deleniti velitena</h2>
                        <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assum perenda sruen jonee
                            trave</h3>
                    </div> --}}
                    <div class="col-lg-6 text-center">
                        <img src="{{ asset('') }}images/logo.png" alt="logo" class="img-fluid">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <p>
                            Bubble Wedding Organizer adalah sebuah perusahaan penyedia jasa persiapan pernikahan yang
                            berdiri sejak tahun 2015 dan menjadi badan usaha yang terdaftar resmi sejak tahun 2020 yang
                            berintegritas, bekerja secara profesional, memberikan solusi dan mengorganisir persiapan serta
                            pelaksanaan di hari bahagia seluruh calon pengantin.
                        </p>
                        <p class="fst-italic">
                            Membantu para calon klien PERISAIKU mengatur persiapan pernikahan serta mengkonsepkan pernikahan
                            yang disesuaikan dengan kebutuhan calon klien PERISAIKU, dan memberikan referensi vendor-vendor
                            pernikahan yang terbaik hingga mengatur prosesi pernikahan pada hari H.
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">

                <div class="row">
                    <div class="col-md-6">
                        <div class="icon-box">
                            <i class="bi bi-activity"></i>
                            <h4><a href="#">Experience</a></h4>
                            <p>Kami memiliki pengalaman dibidang wedding planner dan organizer lebih dari 7 tahun</p>
                        </div>
                    </div>
                    <div class="col-md-6 mt-4 mt-md-0">
                        <div class="icon-box">
                            <i class="bi bi-bar-chart"></i>
                            <h4><a href="#">Integrity</a></h4>
                            <p>Kami bekerja secara intergritas untuk menjadi Top 5 dalam bidang Wedding Planner dan
                                Organizer</p>
                        </div>
                    </div>
                    <div class="col-md-6 mt-4 mt-md-0">
                        <div class="icon-box">
                            <i class="bi bi-microsoft-teams"></i>
                            <h4><a href="#">Team Work</a></h4>
                            <p>Kami menciptakan dan memiliki team-work yang solid dengan man power yang profesional</p>
                        </div>
                    </div>
                    <div class="col-md-6 mt-4 mt-md-0">
                        <div class="icon-box">
                            <i class="bi bi-brightness-high"></i>
                            <h4><a href="#">Service</a></h4>
                            <p>Kami memberikan pelayanan terbaik dengan hasil yang berkualititas untuk mewujudkan pernikahan
                                impian para calon pengantin</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Services Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center mb-3">
                        <h2>Galeri</h2>
                    </div>
                </div>

                <div class="row portfolio-container">
                    @foreach ($galeris as $item)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="{{ $item->image }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <div class="portfolio-links">
                                        <a href="{{ $item->image }}" data-gallery="portfolioGallery"
                                            class="portfolio-lightbox"><i class="bx bx-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Portfolio Section -->

    </main><!-- End #main -->
@endsection
