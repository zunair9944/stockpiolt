@extends('layouts.default')
@section('content')
    <div class="detail-blog-page" id="detail-blog-page wrapper">
        @include('includes.header')
        <div class="blog-details-banner mb-5 py-lg-5 position-relative">
            @if ($page)
                <div class="container">
                    <div class="row py-lg-5">
                        <div class="col-12">
                            <span class="mb-4">Home > Case Studies > {{ $page->title }}</span>
                            <h1 class="position-relative"> {{ $page->title }}</span></h1>
                        </div>
                    </div>
                </div>
        </div>

        <div class="blog-detail-section mb-5 py-lg-5">
            <div class="container">
                <div class="blog-container">
                    <div class="row mb-5">
                        <div class="col-12 col-md-8 d-flex align-items-center">
                            <p style="text-align: justify">
                                {{ $page->description }}
                            </p>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="img-container">
                                <img src="{{ $page->getFirstMediaUrl('images', 'thumb') }}" alt="items"
                                    class="img-fluid mx-auto d-block" />
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        @include('includes.testimonials')

        @include('includes.newsletter')
        @include('includes.footer')
    </div>
@stop
