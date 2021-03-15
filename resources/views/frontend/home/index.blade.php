@extends('frontend.template')

@section('content')

<!-- Banner -->
<section class="banner">
    <div class="container">
        <div id="carouselBanner" class="carousel carousel-banner slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/img/banner/1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/img/banner/2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/img/banner/3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- container -->
<section id="content">
    <div class="container mt-5">
        <h2 class="font-weight-bold my-5 text-primary text-center">Poliklinik</h2>
        <div class="row text-left align-item-center justify-content-center">
            @foreach ($polikliniks as $poliklinik)
            <div class="col-lg-2 mb-3 col-6">
                <div class="card shadow-sm border-0 text-center" style="border-radius: 20px;">
                    <a href="/doctor/schedule/{{ $poliklinik->slug }}" class="text-decoration-none">
                        <div class="card-body">
                            <img src="/img/poliklinik/{{ $poliklinik->image }}" alt="" class="w-75">
                            <h6 class="font-weight-bold mt-4 text-dark">{{ $poliklinik->name }}</h6>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@stop