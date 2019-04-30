@extends('layouts.app')

@section('content')

    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        События
                    </h1>
                    <p class="text-white link-nav"><a href="index.html">Home </a> <span
                                class="lnr lnr-arrow-right"></span> <a href="events.html"> Events</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start events-list Area -->
    <section class="events-list-area section-gap event-page-lists">
        <div class="container">
            <div id="event-fetch" class="row align-items-center">
                @foreach($events as $event)
                    <div class="col-lg-6 pb-30">
                        <div class="single-carusel row align-items-center">
                            <div class="col-12 col-md-6 thumb">
                                <img class="img-fluid" src="{{ admin_uploads($event->cover) }}" alt="">
                            </div>
                            <div class="detials col-12 col-md-6">
                                <p>{{ $event->start_date }}</p>
                                <a href="{{ route('event-show', $event->id) }}"><h4>{{ $event->name }}</h4></a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div v-if="events.length" v-for="event in events" :key="event.id" class="col-lg-6 pb-30">
                    <div class="single-carusel row align-items-center">
                        <div class="col-12 col-md-6 thumb">
                            <img class="img-fluid" :src="`/uploads/${event.cover}`" alt="">
                        </div>
                        <div class="detials col-12 col-md-6">
                            <p>{{ vue('event.start_date') }}</p>
                            <a :href="`/event/${event.id}`"><h4>{{ vue('event.name') }}</h4></a>
                        </div>
                    </div>
                </div>

                <a v-show="viewFetchButton" href="javascript:;" @click="fetch()"
                   class="text-uppercase primary-btn mx-auto mt-40">
                    Загрузить еще
                </a>
            </div>
        </div>
    </section>
    <!-- End events-list Area -->

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