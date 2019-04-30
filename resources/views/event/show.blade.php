@extends('layouts.app')

@section('content')
    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Event Details
                    </h1>
                    <p class="text-white link-nav"><a href="index.html">Home </a> <span
                                class="lnr lnr-arrow-right"></span> <a href="event-details.html"> Event Details</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start event-details Area -->
    <section class="event-details-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 event-details-left">
                    <div class="main-img">
                        <img class="img-fluid" src="{{ admin_uploads($event->cover) }}" alt="">
                    </div>
                    <div class="details-content">
                        <a href="#">
                            <h4>{{ $event->name }}</h4>
                        </a>
                        <div>
                            {!! $event->content !!}
                        </div>
                    </div>
                    <div class="social-nav row no-gutters">
                        <div class="col-lg-6 col-md-6 ">
                            <ul class="focials">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-6 navs">
                            <a href="#" class="nav-prev"><span class="lnr lnr-arrow-left"></span>Назад</a>
                            <a href="#" class="nav-next">Вперед<span class="lnr lnr-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 event-details-right">
                    <div class="single-event-details">
                        <h4>Детали</h4>
                        <ul class="mt-10">
                            <li class="justify-content-between d-flex">
                                <span>Дата начала</span>
                                <span>{{ $event->start_date }}</span>
                            </li>
                            <li class="justify-content-between d-flex">
                                <span>Дата завершения</span>
                                <span>{{ $event->end_date }}</span>
                            </li>
                            <li class="justify-content-between d-flex">
                                <span>Стоимость</span>
                                <span>{{ $event->price == 0 ? 'Бесплатно' :  ($event->price . ' грн') }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="single-event-details">
                        <h4>Место проведения</h4>
                        <ul class="mt-10">
                            <li class="justify-content-between d-flex">
                                <span>{{ $event->place }}</span>
                            </li>
                        </ul>
                    </div>
                    @if($event->organization)
                        <div class="single-event-details">
                            <h4>Организатор</h4>
                            <ul class="mt-10">
                                <li class="justify-content-between d-flex">
                                    <span>{{ $event->organization }}</span>
                                </li>
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
    <!-- End event-details Area -->


    <!-- Start cta-two Area -->
    <section class="cta-two-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 cta-left">
                    <h1>Хотите узнать о кафедре больше?</h1>
                </div>
                <div class="col-lg-4 cta-right">
                    <a class="primary-btn wh" href="#">посмотрите наш блог</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End cta-two Area -->
@endsection