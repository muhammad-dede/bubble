@extends('web.layouts.main')

@section('title', 'Galeri')


@section('content')
    <main id="main">

        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Galeri</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Galeri</li>
                    </ol>
                </div>

            </div>
        </section>

        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="row portfolio-container">
                    @foreach ($galeris as $item)
                        <div class="col-lg-4 col-md-6 portfolio-item">
                            <div class="portfolio-wrap">
                                <img src="{{ $item->image }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <div class="portfolio-links">
                                        <a href="{{ $item->image }}" data-gallery="portfolioGallery"
                                            class="portfolio-lightbox">
                                            <i class="bx bx-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

    </main>
@endsection
