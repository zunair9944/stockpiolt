@extends('layouts.default')
@section('content')
    <div id="wrapper demo-page" class="demo-page">
    @include('includes.header')
    <h1 class="text text-center alert alert-warning">Error 404! Page not found, Return to home? click <a href="/">here</a></h1>
    @include('includes.testimonials')
        @include('includes.newsletter')
        @include('includes.footer')
    </div>
@stop