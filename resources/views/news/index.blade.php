@extends('layouts.app')

@section('content')
    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content blog-header-content col-lg-12">
                    <h1 class="text-white">
                        Dude You’re Getting
                        a Telescope
                    </h1>
                    <p class="text-white">
                        There is a moment in the life of any aspiring astronomer that it is time to buy that first
                    </p>
                    <a href="blog-single.html" class="primary-btn">View More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start top-category-widget Area -->
    <section class="top-category-widget-area pt-90 pb-90 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-cat-widget">
                        <div class="content relative">
                            <div class="overlay overlay-bg"></div>
                            <a href="#" target="_blank">
                                <div class="thumb">
                                    <img class="content-image img-fluid d-block mx-auto" src="img/blog/cat-widget1.jpg"
                                         alt="">
                                </div>
                                <div class="content-details">
                                    <h4 class="content-title mx-auto text-uppercase">Social life</h4>
                                    <span></span>
                                    <p>Enjoy your social life together</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-cat-widget">
                        <div class="content relative">
                            <div class="overlay overlay-bg"></div>
                            <a href="#" target="_blank">
                                <div class="thumb">
                                    <img class="content-image img-fluid d-block mx-auto" src="img/blog/cat-widget2.jpg"
                                         alt="">
                                </div>
                                <div class="content-details">
                                    <h4 class="content-title mx-auto text-uppercase">Politics</h4>
                                    <span></span>
                                    <p>Be a part of politics</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-cat-widget">
                        <div class="content relative">
                            <div class="overlay overlay-bg"></div>
                            <a href="#" target="_blank">
                                <div class="thumb">
                                    <img class="content-image img-fluid d-block mx-auto" src="img/blog/cat-widget3.jpg"
                                         alt="">
                                </div>
                                <div class="content-details">
                                    <h4 class="content-title mx-auto text-uppercase">Food</h4>
                                    <span></span>
                                    <p>Let the food be finished</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End top-category-widget Area -->

    <!-- Start post-content Area -->
    <section class="post-content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    @foreach($news as $singleNews)
                        <div class="single-post row">
                            <div class="col-lg-3  col-md-3 meta-details">
                                {{--<ul class="tags">--}}
                                {{--<li><a href="#">Food,</a></li>--}}
                                {{--<li><a href="#">Technology,</a></li>--}}
                                {{--<li><a href="#">Politics,</a></li>--}}
                                {{--<li><a href="#">Lifestyle</a></li>--}}
                                {{--</ul>--}}
                                <div class="user-details row">
                                    <p class="user-name col-lg-12 col-md-12 col-6"><a
                                                href="#">{{ $singleNews->author }}</a> <span
                                                class="lnr lnr-user"></span></p>
                                    <p class="date col-lg-12 col-md-12 col-6"><a
                                                href="#">{{ \Carbon\Carbon::parse($singleNews->publication_date)->format('d.m.Y H:i') }}</a>
                                        <span
                                                class="lnr lnr-calendar-full"></span></p>
                                    <p class="view col-lg-12 col-md-12 col-6"><a
                                                href="#">Просмотры: {{ $singleNews->views }}</a> <span
                                                class="lnr lnr-eye"></span></p>
                                    <p class="comments col-lg-12 col-md-12 col-6"><a href="#">** комментариев</a> <span
                                                class="lnr lnr-bubble"></span></p>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 ">
                                <div class="feature-img">
                                    <img class="img-fluid" src="{{ '/uploads/' . $singleNews->image }}" alt="">
                                </div>
                                <a class="posts-title" href="{{ route('news-show', $singleNews->id) }}">
                                    <h3>{{ $singleNews->title }}</h3></a>
                                <p class="excert">
                                    {{ $singleNews->short }}
                                </p>
                                <a href="{{ route('news-show', $singleNews->id) }}" class="primary-btn">Подробнее</a>
                            </div>
                        </div>
                    @endforeach


                    <nav class="blog-pagination justify-content-center d-flex">
                        {{ $news->links() }}
                    </nav>
                </div>
                <div class="col-lg-4 sidebar-widgets">
                    @component('news.sidebar', [
                        'popularNews' => $popularNews
                    ])@endcomponent
                </div>
            </div>
        </div>
    </section>
    <!-- End post-content Area -->
@endsection