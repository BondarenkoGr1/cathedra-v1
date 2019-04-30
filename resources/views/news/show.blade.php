@extends('layouts.app')

@section('content')
    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        {{ $news->title }}
                    </h1>
                    <p class="text-white link-nav"><a href="index.html">Home </a> <span
                                class="lnr lnr-arrow-right"></span><a href="blog-home.html">Blog </a> <span
                                class="lnr lnr-arrow-right"></span> <a href="blog-single.html"> Blog Details Page</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start post-content Area -->
    <section class="post-content-area single-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid" src="{{ '/uploads/' . $news->image }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-3  col-md-3 meta-details">
                            {{--<ul class="tags">--}}
                            {{--<li><a href="#">Food,</a></li>--}}
                            {{--<li><a href="#">Technology,</a></li>--}}
                            {{--<li><a href="#">Politics,</a></li>--}}
                            {{--<li><a href="#">Lifestyle</a></li>--}}
                            {{--</ul>--}}
                            <div class="user-details row">
                                <p class="user-name col-lg-12 col-md-12 col-6"><a href="#">{{ $news->author }}</a> <span
                                            class="lnr lnr-user"></span></p>
                                <p class="date col-lg-12 col-md-12 col-6"><a
                                            href="#">{{ \Carbon\Carbon::parse($news->publication_date)->format('d.m.Y H:i') }}</a>
                                    <span
                                            class="lnr lnr-calendar-full"></span></p>
                                <p class="view col-lg-12 col-md-12 col-6"><a href="#">Просмотры: {{ $news->views }}</a>
                                    <span
                                            class="lnr lnr-eye"></span></p>
                                <p class="comments col-lg-12 col-md-12 col-6"><a href="#">** комментариев</a> <span
                                            class="lnr lnr-bubble"></span></p>
                                <ul class="social-links col-lg-12 col-md-12 col-6">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-github"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <h3 class="mt-20 mb-20">{{ $news->title }}</h3>
                            <p class="excert">
                                {{ $news->short }}
                            </p>
                        </div>
                        <div class="col-lg-12">
                            {!! $news->content !!}
                        </div>
                    </div>
                    <div class="navigation-area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                @if($previous)
                                    <div class="thumb" style="width: 40%;">
                                        <a href="{{ route('news-show', $previous->id) }}"><img class="img-fluid"
                                                                                               src="{{ '/uploads/' . $previous->image }}"
                                                                                               alt=""></a>
                                    </div>
                                    <div class="arrow" style="width: 40%;">
                                        <a href="{{ route('news-show', $previous->id) }}"><span
                                                    class="lnr text-white lnr-arrow-left"></span></a>
                                    </div>
                                    <div class="detials" style="width: 60%">
                                        <p>Предыдущая новость</p>
                                        <a href="{{ route('news-show', $previous->id) }}">
                                            <h4>{{ $previous->title }}</h4></a>
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                @if($next)
                                    <div class="detials" style="width: 60%">
                                        <p>Следующая новость</p>
                                        <a href="{{ route('news-show', $next->id) }}"><h4>{{ $next->title }}</h4></a>
                                    </div>
                                    <div class="arrow" style="width: 40%;">
                                        <a href="{{ route('news-show', $next->id) }}"><span
                                                    class="lnr text-white lnr-arrow-right"></span></a>
                                    </div>
                                    <div class="thumb" style="width: 40%;">
                                        <a href="{{ route('news-show', $next->id) }}"><img class="img-fluid"
                                                                                           src="{{ '/uploads/' . $next->image }}"
                                                                                           alt=""></a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="comments-area">
                        <h4>05 Comments</h4>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="/img/blog/c1.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Emilly Blunt</a></h5>
                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                        <p class="comment">
                                            Never say goodbye till the end comes!
                                        </p>
                                    </div>
                                </div>
                                <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="comment-list left-padding">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="/img/blog/c2.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Elsie Cunningham</a></h5>
                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                        <p class="comment">
                                            Never say goodbye till the end comes!
                                        </p>
                                    </div>
                                </div>
                                <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="comment-list left-padding">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="/img/blog/c3.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Annie Stephens</a></h5>
                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                        <p class="comment">
                                            Never say goodbye till the end comes!
                                        </p>
                                    </div>
                                </div>
                                <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="/img/blog/c4.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Maria Luna</a></h5>
                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                        <p class="comment">
                                            Never say goodbye till the end comes!
                                        </p>
                                    </div>
                                </div>
                                <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="/img/blog/c5.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Ina Hayes</a></h5>
                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                        <p class="comment">
                                            Never say goodbye till the end comes!
                                        </p>
                                    </div>
                                </div>
                                <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-form">
                        <h4>Leave a Comment</h4>
                        <form>
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-12 name">
                                    <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                                </div>
                                <div class="form-group col-lg-6 col-md-12 email">
                                    <input type="email" class="form-control" id="email"
                                           placeholder="Enter email address" onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Enter email address'">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" placeholder="Subject"
                                       onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"
                                          onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"
                                          required=""></textarea>
                            </div>
                            <a href="#" class="primary-btn text-uppercase">Post Comment</a>
                        </form>
                    </div>
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