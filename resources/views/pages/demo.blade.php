@extends('layouts.default')
@section('content')
    <div id="wrapper demo-page" class="demo-page">
    @include('includes.header')

    {!! str_replace('images/', env('APP_URL').'/images/', $page->body) !!}

        <div class="container_" id="request-live-demo">
            <div class="contact-us-form mb-5 col-lg-10 mx-auto d-block px-lg-5">
                <div class="text-center overflow-hidden mb-3">
                    <h2> <span>Request</span>a live demo!</h2>
                    <p>Please complete the form below and we will be in touch with you soon.</p>
                </div>
                <form class="row g-3">
                  <div class="col-md-6 col-12">
                    <label for="inputEmail4" class="form-label">Full Name<span class="times">*</span></label>
                    <input type="text" class="form-control bg-transparent" placeholder="Full Name" id="inputEmail4">
                  </div>
                  <div class="col-md-6 col-12 mb-3">
                    <label class="form-label" for="inputSelect">Select Service<span class="times">*</span></label>
                    <select class="form-select bg-transparent text-secondary" id="inputSelect" name="inputSelect">
                        <option value="Service1">Service1</option>
                        <option value="Service2">Service2</option>
                    </select>
                  </div>
                   <div class="col-md-6 col-12">
                    <label for="inputPassword5" class="form-label">Email<span class="times">*</span></label>
                    <input type="email" placeholder="mail@gmail.com" class="form-control bg-transparent" id="inputPassword5">
                  </div>
                   <div class="col-md-6 col-12">
                    <label for="inputPassword6" class="form-label">Contact Number<span class="times">*</span></label>
                    <div class="d-flex flex-row rounded border"> 
                        <select class="form-select bg-transparent text-secondary border-0 w-25 border-right" id="inputSelect" name="inputSelect">
                            <option value="us">US</option>
                            <option value="poland">POLAND</option>
                            <option value="china">CHINA</option>
                        </select>
                        <input type="password" placeholder="(+1) 000-000-1234"  class="form-control bg-transparent border-0" id="inputPassword6">    
                    </div>
                  </div>
                  <div class="mb-3">
                   <label for="exampleFormControlTextarea1" class="form-label">Description<span class="times">*</span></label>
                   <textarea class="form-control bg-transparent" placeholder="mail@gmail.com" id="exampleFormControlTextarea1" rows="4"></textarea>
                 </div>
                 <div class="communication-form mb-3 m-auto text-center">
                    <p class="mb-2">Preferred source of communication:</p>
                     <div class="communication ">
                        <div class="communication-email d-flex justify-content-between align-items-center px-5">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name=" flexRadioDefault" id="flexRadioDefault2" checked>
                              <label class="form-check-label" for="flexRadioDefault2">
                                    Email
                                </label>
                            </div>
                        <div class="communication-email">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name=" flexRadioDefault" id="flexRadioDefault2" checked>
                              <label class="form-check-label" for="flexRadioDefault2">
                                    Call
                                </label>
                            </div>
                        </div>
                     </div>
                    </div>
                </div>
                    <div class="communication-btn">
                        <a class="btn custom-btn" href="#">Submit</a>
                    </div>
                    <p class="mb-2 text-center">We will never share your information</p>
                </form>
            </div>
        </div>

        @include('includes.testimonials')
        @include('includes.newsletter')
        @include('includes.footer')
    </div>
@stop