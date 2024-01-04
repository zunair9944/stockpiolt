@extends('layouts.default')
@section('content')

    <style>
        @media only screen and (max-width: 767.98px) {
            .blog-list-recent-post {
                width: 100%;
            }
        }

        @media only screen and (min-width: 767.98px) {
            .blog-list-recent-post {
                width: 45%;
            }
        }

        @media only screen and (min-width: 1023.98px) {
            .blog-list-recent-post {
                width: 30%;
            }
        }
    </style>
    <div class="blog-page" id="blog-page wrapper">
        @include('includes.header')
        {!! str_replace('images/', env('APP_URL') . '/images/', $page->body) !!}
        <div class="recents-items p-4 py-lg-5">
            <div class="container">
                <div class="row">
                    @if ($topBar)
                        @foreach ($topBar as $tb)
                            <div class="col-12 col-lg-4">
                                <div class="item d-flex flex-row justify-content-center align-items-center mb-4">
                                    <div class="img-container">
                                        <img src="{{ $tb->getFirstMediaUrl('images', 'thumb') }}" alt="items"
                                            class="img-fluid mx-auto d-block" />
                                    </div>
                                    <div class="item-data">
                                        <a href="/blog-detail/{{ $tb->id }}">
                                            <h3>{{ makeTitle($tb->title) }}</h3>
                                        </a>
                                        <span>{{ date('d M, Y', strtotime($tb->created_at)) }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>

        <div class="recent-post py-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-5">
                        <h2>
                            Recent Posts
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="60" fill="currentColor"
                                class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
                                </path>
                            </svg>
                        </h2>
                    </div>
                    <div class="col-12  d-flex flex-wrap gap-3 mb-5">
                        @if ($features)
                            <?php $csc = 1; ?>
                            @foreach ($features as $rt)
                                @if ($csc == 1)
                                    <div class="card border-0 w-100">
                                        <div class="card-image-portion position-relative"
                                            style="max-height: 373px; min-height: 370px;">
                                            <img src="{{ $rt->getFirstMediaUrl('images', 'thumb') }}" alt="items"
                                                class="d-block m-auto img-fluid w-100 h-100" />
                                        </div>
                                        <div
                                            class="card-box-text-container position-absolute top-0 right-0 h-100 w-100 d-flex justify-content-between flex-column p-4">
                                            <div class="card-text">
                                                <span>{{ $rt->is_featured ? 'Featured' : 'Not Featured' }}</span>
                                                <a href="/blog-detail/{{ $rt->id }}">
                                                    <p class="pt-4">{{ makeTitle($rt->description) }}</p>
                                                </a>
                                            </div>
                                            <div class="text-start text-white">
                                                <a href="/blog-detail/{{ $rt->id }}">Learn More
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="Blog-list blog-list-recent-post py-lg-5 py-4">

                                        <div class="card border-0">
                                            <div class="card-image-portion position-relative"
                                                style="max-height: 373px; min-height: 370px;">
                                                <img src="{{ $rt->getFirstMediaUrl('images', 'thumb') }}" alt="items"
                                                    class="d-block m-auto img-fluid w-100 h-100"
                                                    style="min-height: 373px;" />
                                            </div>
                                            <div
                                                class="card-box-text-container position-absolute top-0 right-0 h-100 w-100 d-flex justify-content-between flex-column p-4">
                                                <div class="card-text">
                                                    <span>{{ $rt->is_featured ? 'Featured' : 'Not Featured' }}</span>
                                                    <a href="/blog-detail/{{ $rt->id }}">
                                                        <p class="pt-4">{{ makeTitle($rt->title) }}</p>
                                                    </a>
                                                </div>
                                                <div class="text-start text-white">
                                                    <a href="/blog-detail/{{ $rt->id }}">Learn More
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-chevron-right"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endif
                                <?php $csc++; ?>
                            @endforeach
                        @endif
                    </div>

                </div>
            </div>
        </div>
        <div class="trending-blogs py-lg-5">
            <div class="container">
                <div class="row mb-5 d-none d-md-flex">
                    <div class="col-12 col-md-6">
                        <h2>Directory of Trending Blogs</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="mb-4 text-center weekly-newsletter d-flex flex-column justify-content-center py-5 px-4">
                            <h3 class="mb-4 pt-4">Subscribe to our Weekly Newsletter</h3>
                            <p class="mb-5">The Blog Will give you information The Blog Will give you Blog Will
                                give </p>
                            <a class="btn custom-btn mb-4" href="/subscribers#newsletter-section-1">See more below</a>
                            {{-- <a class="btn custom-btn mb-4" href="#">See more below</a> --}}
                        </div>
                    </div>
                    @if ($blogs)
                        <?php $bgs = 1; ?>
                        @foreach ($blogs as $bg)
                            @if ($bgs == 1)
                                <div class="col-12 col-lg-8 d-none d-lg-flex">
                                    <div class="card card1 mb-4 w-100">
                                        <img class="card-img" src="{{ $bg->getFirstMediaUrl('images', 'thumb') }}"
                                            alt="items" />
                                        <div>
                                            <div class="card-data d-flex flex-row justify-content-between px-4 py-3">
                                                <div class="button">
                                                    <a>BLOCKCHAIN</a>
                                                </div>
                                                <div class="author d-flex flex-row gap-4">
                                                    <p>{{ $bg->mataTitle }}</p>
                                                    <p>{{ $bg->mataTags }}</p>
                                                </div>
                                            </div>
                                            <div class="card-text px-4">
                                                <a href="/blog-detail/{{ $bg->id }}">
                                                    <span>{{ makeTitle($bg->title) }}</span></a>
                                                <p>{{ makeTitle($bg->description) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="card card1 mb-4">

                                        <img class="card-img w-100" style="max-height: 373px; min-height: 370px;"
                                            src="{{ $bg->getFirstMediaUrl('images', 'thumb') }}" alt="items" />

                                        <div>
                                            <div
                                                class="card-data d-flex flex-row justify-content-between align-items-center gap-3 px-4 py-3">
                                                <div class="">
                                                    <a
                                                        style="border: 1px solid #76FAA3; color: #76FAA3; padding: 10px 20px">WEB</a>
                                                </div>
                                                <div class="author d-flex flex-row gap-4">
                                                    <p>{{ $bg->mataTitle }}</p>
                                                    <p>{{ $bg->mataTags }}</p>
                                                </div>
                                            </div>
                                            <div class="card-text px-4">
                                                <a href="/blog-detail/{{ $bg->id }}">
                                                    <span>{{ makeTitle($bg->title) }}</span></a>
                                                <p>{{ makeTitle($bg->description) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <?php $bgs++; ?>
                        @endforeach
                    @endif

                </div>
                {{-- <div class="row mb-5 d-none d-md-flex">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card1 mb-4">
                        <img class="card-img" src="images/trending-blogs1.png" />
                        <div>
                            <div class="card-data d-flex flex-row justify-content-between px-4 py-3">
                                <div class="button">
                                    <a>WEB</a>
                                </div>
                                <div class="author d-flex flex-row gap-4">
                                    <p>Lorem 12</p>
                                    <p>8 min read</p>
                                </div>
                            </div>
                            <div class="card-text px-4">
                                <span>8 Easy Ways to Cut Down on Software Development Cost</span>
                                <p>The Blog Will give you information about Launch Your Next Big FinTech Empire
                                    With The
                                    Guide Inside</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card1 mb-4">
                        <img class="card-img" src="images/trending-blogs2.png" />
                        <div>
                            <div class="card-data d-flex flex-row justify-content-between px-4 py-3">
                                <div class="button">
                                    <a>WEB</a>
                                </div>
                                <div class="author d-flex flex-row gap-4">
                                    <p>Lorem 12</p>
                                    <p>8 min read</p>
                                </div>
                            </div>
                            <div class="card-text px-4">
                                <span>8 Easy Ways to Cut Down on Software Development Cost</span>
                                <p>The Blog Will give you information about Launch Your Next Big FinTech Empire
                                    With The
                                    Guide Inside</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card1 mb-4">
                        <img class="card-img" src="images/trending-blogs3.png" />
                        <div>
                            <div class="card-data d-flex flex-row justify-content-between px-4 py-3">
                                <div class="button">
                                    <a>WEB</a>
                                </div>
                                <div class="author d-flex flex-row gap-4">
                                    <p>Lorem 12</p>
                                    <p>8 min read</p>
                                </div>
                            </div>
                            <div class="card-text px-4">
                                <span>8 Easy Ways to Cut Down on Software Development Cost</span>
                                <p>The Blog Will give you information about Launch Your Next Big FinTech Empire
                                    With The
                                    Guide Inside</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            </div>
        </div>

        @include('includes.testimonials')
        @include('includes.newsletter')
        @include('includes.footer')
    </div>
@stop
