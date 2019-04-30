@extends('layouts.app')

@section('content')
    <!-- start banner Area -->
    <section class="banner-area relative about-banner" style="background-image: url('{{ admin_uploads($album->cover) }}')" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">{{ $album->name }}</h1>
                    <p class="text-white"> {{ $album->description }}</p>
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

                @foreach($files as $key => $file)
                    @if($file !== '.' && $file !== '..')
                        <div class="col-lg-{{ $cols[$key%7] }}">
                            <a href="{{ '/storage/albums/' . $album->id . '/' . $file }}" class="img-gal">
                                <div class="single-imgs relative">
                                    <div class="relative">
                                        <img style="object-fit: cover; height: 300px" class="img-fluid" src="{{ '/storage/albums/' . $album->id . '/' . $file }}" alt="">
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
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