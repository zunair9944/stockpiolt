@extends('layouts.default')
@section('content')
    <div id="wrapper contact-us-page" class="contact-us-page">
        @include('includes.header')
        @if (session()->has('success'))
            {!! session()->get('success') !!}
        @endif
        <div class="contact-us-section mb-5">
            <div class="container mb-5 py-5">
                <div class="contact-us-form mb-4 col-lg-10 mx-auto d-block px-lg-5">
                    <div class="text-center overflow-hidden mb-3">
                        <h2>Get in Touch With Us!</h2>
                        <p>Please complete the form below and we will be in touch with you soon.
                        </p>
                    </div>
                    <form class="row g-3" id="quickForm" method="post" action="{{ route('submit-contact-form') }}">
                        <div class="col-md-12 col-12">
                            <label for="inputEmail4" class="form-label d-flex gap-3">Full Name<span
                                    class="times">*</span></label>
                            <input type="text" class="form-control" placeholder="Full Name" name="name"
                                id="inputEmail4">
                        </div>
                        @csrf
                        <div class="col-md-6 col-12">
                            <label for="inputPassword5" class="form-label d-flex gap-3">Email<span
                                    class="times">*</span></label>
                            <input type="email" placeholder="mail@gmail.com" class="form-control" name="email"
                                id="inputPassword5">
                        </div>
                        <div class="col-md-6 col-12">
                            <label for="inputPassword6" class="form-label d-flex gap-3">Contact Number<span
                                    class="times">*</span></label>
                            <input type="text" placeholder="(+1) 000-000-1234" class="form-control" name="phone"
                                id="inputPassword6">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label d-flex gap-3">Description<span
                                    class="times">*</span></label>
                            <textarea class="form-control" placeholder="Message" name="message" id="exampleFormControlTextarea1" rows="4"></textarea>
                        </div>
                        <div class="communication-form mb-3 m-auto text-center">
                            <p class="mb-2">Preferred source of communication:</p>
                            <div class="communication ">
                                <div class="communication-email d-flex justify-content-between align-items-center px-5">
                                    <div class="form-check">
                                        <input class="form-check-input" value="email" type="radio"
                                            name="flexRadioDefault" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Email
                                        </label>
                                    </div>
                                    <div class="communication-email">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="call"
                                                name="flexRadioDefault" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Call
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="communication-btn">
                            <button type="submit" class="btn custom-btn">Submit</button>

                            <!-- <a class="btn custom-btn" href="#">Submit</a> -->
                        </div>
                    </form>
                </div>
            </div>
            {!! str_replace('images/', env('APP_URL') . '/images/', $page->body) !!}
            <div class="contact-support mb-5 py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 mx-auto d-block px-lg-5">
                            <div class="col-12">
                                <div class="text-center overflow-hidden mb-3">
                                    <h2>Contact Support</h2>
                                    <p>Use the below details to contact Stock Pilot.</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="contact-support-wrap row text-center">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="box">
                                            <div class="icon mb-3">
                                                <img src="images/question 1.png" class="mx-auto d-block">
                                            </div>
                                            <strong class="title d-block mb-3">Chat with us</strong>
                                            <div class="communication-btn">
                                                <a class="btn custom-btn" href="#">CHAT NOW</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="box">
                                            <div class="icon mb-3">
                                                <img src="images/contact 1.png" class="mx-auto d-block">
                                            </div>
                                            <strong class="title d-block mb-3">Call Us</strong>
                                            <div class="communication-btn">
                                                <a class="btn custom-btn" href="#">CALL NOW</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="box">
                                            <div class="icon mb-3">
                                                <img src="images/Group 1.png" class="mx-auto d-block">
                                            </div>
                                            <strong class="title d-block mb-3">Email Us</strong>
                                            <div class="communication-btn">
                                                <a class="btn custom-btn" href="#">EMAIL NOW</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($settings)
                <div class="office-location mb-5 py-5">
                    <div class="row">
                        <div class="col-lg-10 mx-auto d-block px-lg-5">
                            <div class="row ">
                                <div class="col-12">
                                    <div class="text-center overflow-hidden mb-5">
                                        <h2>OFFICE LOCATION </h2>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="office-location-map mb-4">
                                        {!! $settings->map !!}
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 text-strat text-md-start text-holder">
                                    <div class="office-location-wrap">
                                        <h2 class="d-md-block mb-2 text-start"><span>{{ $settings->country }}</span></h2>
                                        <p class="mb-3">Worldwide Corporate Headquarters</p>
                                        <div class="milling-address px-md-4">
                                            <strong>Mailing Address</strong>
                                            <address class="pt-2">{{ $settings->address }}
                                            </address>
                                            <hr>
                                            <div class="phone d-flex">
                                                <strong>Phone</strong>
                                                <p class="ms-5">{{ $settings->phone }}</p>
                                            </div>
                                            <hr>
                                            <div class="email">
                                                <strong>Email</strong>
                                                <p class="mb-0">{{ $settings->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="container mb-5 py-5">
                <div class="rpw">
                    <div class="col-lg-8 m-auto d-block">
                        <div class="schedule-meeting mb-3">
                            <div class="schedule text-center d-md-flex justify-content-between align-items-center">
                                <h2 class="mb-md-0 mb-4">Schedule a meeting with our expert</h2>
                                <div class="communication-btn">
                                    <a class="btn custom-btn" href="https://www.calendly.com/chuck-sp">Schedule
                                        Meeting</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('includes.newsletter')
        </div>
        @include('includes.footer')

    </div>
    @include('includes.admin.validationScript')
    <script>
        $(function() {
            $.validator.setDefaults({
                submitHandler: function() {
                    $('#quickForm').submit();

                }
            });
            $('#quickForm').validate({
                rules: {
                    title: {
                        required: true,
                        minlength: 5
                    },
                    description: {
                        required: true,
                        minlength: 30
                    },
                    summernote: {
                        required: true
                    },
                    tag_id: {
                        required: true
                    },
                    image: {
                        required: true,
                        extension: "jpg|jpeg|png"
                    }
                },
                messages: {
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a valid email address"
                    },
                    image: {
                        required: "Please upload file.",
                        extension: "Please upload file in these format only (jpg, jpeg, png)."
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    summernote: "Description is required",
                    tag_id: "Please select a tag",
                    terms: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@stop
