@extends('layouts.default')
@section('content')
    <div id="wrapper case-study-page" class="case-study-page">
        @include('includes.header')
        <div class="case-studies-section">

            {!! str_replace('images/', env('APP_URL') . '/images/', $page->body) !!}
            @if ($cases)
                <?php $csc = 1; ?>

                @foreach ($cases as $cs)
                    @if ($csc == 1)
                        <div class="case-study-name mb-5 px-lg-5">
                            <div class="container">
                                <div class="row d-md-flex align-items-center">
                                    <div class="col-12 col-md-5 col-lg-5">
                                        <div class="about-us-image mb-5">
                                            <div class="about-us-image-section">
                                                <img src="{{ $cs->getFirstMediaUrl('images', 'thumb') }}" alt="items"
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-7 col-lg-7 px-lg-5">
                                        <div class="about-us-content text-center text-md-start case-study-heading">
                                            <strong class="case-study-tab mb-3"><span class="case-1">1/ </span> CASE
                                                STUDY</strong>
                                            <h2 class="mb-md-4">{{ $cs->title }}</h2>
                                            <p class="case-study-mobile"><span class="case-1">1/ </span> CASE STUDY</p>
                                            <p>{{ $cs->description }}</p>
                                            <div class="case-btn">
                                                <a class="btn custom-btn" href="/case-detail/{{ $cs->id }}">Read
                                                    Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="case-study-business-main mb-5 px-lg-5">
                            <div class="container">
                                <div class="row align-items-center text-center text-md-start">
                                    <div class="col-12 col-md-6">
                                        <div class="case-study-business text-center text-md-start mb-3">
                                            <h2>Who we are and <span>how we can help<span> your business</h2>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="case-study-business-text">
                                            <p>Client-centered, digital marketing campaigns built around your goals and
                                                managed
                                                closely
                                                by friendly experts who keep you in the loop. Satisfy the bottom line and
                                                give
                                                your
                                                whole team peace of mind as we charge towards your targets together.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="case-study-name mb-4 mb-md-5">
                            <div class="container">
                                <div class="row flex-column-reverse flex-md-row align-items-center">
                                    <div class="col-12 col-md-7 col-lg-7 ">
                                        <div class="about-us-content text-center text-md-start case-study-heading">
                                            <p class="case-study-tab"><span class="case-1">2/ </span> CASE STUDY</p>
                                            <h2 class="mb-md-4">{{ $cs->title }}</h2>
                                            <p class="case-study-mobile"><span class="case-1">2/ </span> CASE STUDY</p>
                                            <p>{{ $cs->description }}
                                            </p>
                                            <div class="case-btn">
                                                <a class="btn custom-btn" href="/case-detail/{{ $cs->id }}">Read
                                                    now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5 col-lg-5">
                                        <div class="about-us-image mb-5">
                                            <div class="about-us-image-section">
                                                <img src="{{ $cs->getFirstMediaUrl('images', 'thumb') }}" alt="items"
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <?php $csc++; ?>
                @endforeach
            @endif





            <div class="read-more-case-study-main mb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center mb-5">
                                <h2>Read More Case Studies</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="slider feature-slider read-more-case-study">
                                @if ($cases2)
                                    @foreach ($cases2 as $cs2)
                                        <div>
                                            <div class="box case-study-box">
                                                <div class="case-study-img">
                                                    <img src="{{ $cs2->getFirstMediaUrl('images', 'thumb') }}"
                                                        alt="items" class="img-fluid w-100">
                                                </div>
                                                <div class="case-details p-4">
                                                    <div
                                                        class="d-flex justify-content-between align-items-center flex-wrap pb-4">
                                                        <a class="btn case-link mb-2 mb-md-0"
                                                            href="/case-detail/{{ $cs2->id }}">WEB</a>
                                                        <div class="case-title">
                                                            <p class="mb-0"><span class="me-3"></span><span>8
                                                                    min
                                                                    read</span></p>
                                                        </div>
                                                    </div>
                                                    <h3 class="  mb-3">{{ $cs2->title }}
                                                    </h3>
                                                    <p>{{ $cs2->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                {{-- <div>
                                    <div class="box case-study-box">
                                        <div class="case-study-img">
                                            <img src="images/Rectangle 893.png" alt="" class="img-fluid w-100">
                                        </div>
                                        <div class="case-details p-md-4 p-3">
                                            <div class="d-flex justify-content-between align-items-center flex-wrap pb-4">
                                                <a class="btn case-link mb-2 mb-md-0" href="#">Lorem Ipsum</a>
                                                <div class="case-title">
                                                    <p class="mb-0"><span class="me-3">Lorem 12</span><span>8 min
                                                            read</span></p>
                                                </div>
                                            </div>
                                            <h3 class=" mb-3">8 Easy Ways to Cut Down on Software Development Cost.
                                            </h3>
                                            <p>The Blog Will give you information about Launch Your Next Big FinTech
                                                Empire
                                                With The Guide Inside.</p>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div>
                                    <div class="box case-study-box">
                                        <div class="case-study-img">
                                            <img src="images/Rectangle 893.png" alt="" class="img-fluid w-100">
                                        </div>
                                        <div class="case-details p-4">
                                            <div class="d-flex justify-content-between align-items-center flex-wrap pb-4">
                                                <a class="btn case-link mb-2 mb-md-0" href="#">Lorem Ipsum</a>
                                                <div class="case-title">
                                                    <p class="mb-0"><span class="me-3">Lorem 12</span><span>8 min
                                                            read</span></p>
                                                </div>
                                            </div>
                                            <h3 class="mb-3">8 Easy Ways to Cut Down on Software Development Cost.
                                            </h3>
                                            <p>The Blog Will give you information about Launch Your Next Big FinTech
                                                Empire
                                                With The Guide Inside.</p>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {!! $page2->body !!}

        </div>
        @include('includes.testimonials')
        @include('includes.newsletter')
        @include('includes.footer')
    </div>
@stop
