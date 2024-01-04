@extends('layouts.default')
@section('content')
<div id="wrapper about-us-page" class="about-us-page">
        @include('includes.header')

        <div class="about-us-section-banner">
        {!! str_replace('images/', env('APP_URL').'/images/', $page->body) !!}
            <div class="feature-section leaders-founder-main mb-5 py-lg-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center overflow-hidden mb-5">
                                <h2>Leaders And Founders</h2>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="slider feature-slider text-center leaders-founder">
                                @foreach($team as $member)
                                <div class="box mb-3 text-center">
                                    <div class="icon mb-3">
                                        <img src="{{$member->getFirstMediaUrl('images', 'thumb')}}" class="mx-auto d-block img-fluid">
                                    </div>
                                    <strong>{{ $member->name }}</strong>
                                    <p>{{ $member->dsignation }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="feature-section feature-section-press mb-3 press-section-main">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center overflow-hidden mb-3">
                                <h2>In the Press</h2>
                            </div>    
                        </div>
                        <div class="col-12">
                            <div class="slider feature-slider text-center press-section">
                                @foreach($news as $release)
                                <div class="box mb-3 text-center text-md-start">
                                    <div class="icon mb-3">
                                        <img src="{{$release->getFirstMediaUrl('images', 'thumb')}}" class="mx-auto d-block img-fluid" alt="{{asset($release->getFirstMediaUrl('images', 'thumb'))}}">
                                        
                                    </div>
                                    <p>{{$release->title}}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

			@include('includes.testimonials')
        </div>

        @include('includes.newsletter')
        @include('includes.footer')

    </div>
    @stop