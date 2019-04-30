@extends('layouts.app')

@section('content')
    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Gallery
                    </h1>
                    <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="gallery.html"> Gallery</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start gallery Area -->
    <section class="gallery-area section-gap">
        <div class="container">
            <div class="row">
                @php
                    $cols = [7, 5, 4, 4, 4, 5, 7];
                @endphp

                @foreach($albums as $key => $album)
                    <div class="col-lg-{{ $cols[$key%7] }}">
                        <a href="{{ route('album-show', $album->id) }}">
                            <div class="single-imgs relative">
                                <div class="overlay overlay-bg text-center">
                                    <h4 style="color: #fff; margin-top:40px;">{{ $album->name }}</h4>
                                </div>
                                <div class="relative">
                                    <img style="object-fit: cover; height: 300px" class="img-fluid" src="{{ admin_uploads($album->cover) }}" alt="">
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End gallery Area -->


    <!-- Start cta-two Area -->
    <section class="cta-two-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 cta-left">
                    <h1>Хотите узнать о кафедре больше?</h1>
                </div>
                <div class="col-lg-4 cta-right">
                    <a class="primary-btn wh" href="/news">посмотрите наш блог</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End cta-two Area -->
@endsection