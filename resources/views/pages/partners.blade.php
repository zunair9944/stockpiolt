@extends('layouts.default')
@section('content')
    <div id="wrapper partners-page" class="partners-page">
        @include('includes.header')
        <div class="partners-page-section mb-5 py-lg-5">
            <div class="partners-page-inside">
                <div class="container">
                    <div class="row ">
                        <div class="col-12 col-md-6 col-lg-6 ">
                            <div class="mb-3 partners-page-1 text-center text-md-start mb-5 mb-md-0">
                                <div class="partners-us-text text-center text-md-start">
                                    <h2>Become a StockPilot Partner</h2>
                                </div>
                                <p>StockPilot gets your software and services in front of our growing user base of 25,000+
                                    customers—along with sales support, technical training, and personalized co-marketing
                                    opportunities.</p>
                                <a class="btn custom-btn" href="#">Get Started</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="about-us-image mb-3">
                                <div class="about-us-image-section">
                                    <img src="images/partners.png" alt="image" class="img-fluid mx-auto d-block">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="partners-page-tabs">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-pills mb-3 text-center justify-content-center " id="pills-tab" role="tablist">
                            <li class="nav-item partner-assets" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Partners</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">Assets</button>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <div class="partners-slide-main mb-5 py-5">
                                    <div class="slider feature-slider partners-slide-child">
                                        @if ($companies)
                                            @foreach ($companies as $com)
                                                <div class="box case-study-box partner-child">
                                                    <div class="partners-img">
                                                        <img src="{{ $com->getFirstMediaUrl('images', 'thumb') }}"
                                                            alt="items" class="img-fluid ">

                                                    </div>
                                                    <div class="case-details m-4 pt-3 border-top">
                                                        <p>{{ $com->description }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <div class="table-container table-responsive-sm p-5 mb-5">
                                    <table class="table text-white text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col">Broker</th>
                                                <th scope="col">Stocks</th>
                                                <th scope="col">Options</th>
                                                <th scope="col">Futures</th>
                                                <th scope="col">Crypto</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><img src="images/table-vector1.png" alt="vector" />
                                                </th>
                                                <td>-</td>
                                                <td>-</td>
                                                <td><img src="images/table-check.png" alt="check" /></td>
                                                <td>-</td>
                                                <td>
                                                    <p>Open <br> Account</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><img src="images/table-vector2.png" alt="vector" />
                                                </th>
                                                <td><img src="images/table-check.png" alt="check" /></td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>
                                                    <p>Open <br> Account</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><img src="images/table-vector3.png" alt="vector" />
                                                </th>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>
                                                    <p>Open <br> Account</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><img src="images/table-ventor4.png" alt="vector" />
                                                </th>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>
                                                    <p>Open <br> Account</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><img src="images/table-vector5.png" alt="vector" />
                                                </th>
                                                <td>-</td>
                                                <td>-</td>
                                                <td><img src="images/table-check.png" alt="check" /></td>
                                                <td>-</td>
                                                <td>
                                                    <p>Open <br> Account</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        {{-- <div class="sign-up-section mb-5 py-5">
            <div class="container_ p-md-5">
                <div class="sign-up-container p-4">
                    <div class="row">
                        <div class="col-12 text-center mb-5">
                            <h2>Sign Up</h2>
                        </div>
                        <div class="col-12">
                            <form class="row g-3 partner-form">
                                <div class="col-13 col-md-6 mb-5 d-flex flex-column justify-content-center">
                                    <div class="name-container">
                                        <label for="inputname" class="form-label d-flex gap-3">Full Name<span
                                                class="times">*</span></label>
                                        <input type="text" class="form-control bg-transparent" placeholder="Full Name"
                                            id="inputname">
                                    </div>
                                    <div class="email-container">
                                        <label for="inputemail" class="form-label d-flex gap-3">Email<span
                                                class="times">*</span></label>
                                        <input type="email" placeholder="abcd@email.com"
                                            class="form-control bg-transparent" id="inputemail">
                                    </div>
                                    <div class="password-container">
                                        <label for="inputemail" class="form-label d-flex gap-3">Password<span
                                                class="times">*</span></label>
                                        <input type="password" placeholder="**********"
                                            class="form-control  bg-transparent" id="inputemail">
                                    </div>
                                    <div class="re-password-container">
                                        <label for="inputemail" class="form-label d-flex gap-3">Confirm Password<span
                                                class="times">*</span></label>
                                        <input type="password" placeholder="**********"
                                            class="form-control  bg-transparent" id="inputemail">
                                    </div>
                                </div>
                                <div class="col-6 d-none d-lg-block">
                                    <div class="image-container">
                                        <img src="images/partner-sign-up-vector.png" alt="form image"
                                            class="img-fluid mx-auto d-block" />
                                    </div>
                                </div>
                                <div class="col-12 text-center d-flex flex-column communication-btn py-5">
                                    <a class="btn custom-btn mb-4 w-50" href="#">Register Now</a>
                                    <p class="d-block">By clicking "Register Now" you agree to our Terms of Service and
                                        Privacy Notice.</p>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div> --}}

        <div class="our-partners-section mb-5 py-5">
            <div class="container">
                <div class="our-partner-container">
                    <div class="row d-flex flex-column justify-content-center align-items-center">
                        <div class="col-12 text-center mb-5">
                            <h2>Our Partners</h2>
                        </div>
                        <div class="col-12 col-md-8">
                            <div
                                class="card-container d-flex flex-row flex-wrap justify-content-center py-lg-5 gap-md-5 gap-4">
                                <div class="card">
                                    <div class="card-image-container">
                                        <img src="images/pilot-partner-section-vector.png" alt="vector0"
                                            class="img-fluid mx-auto d-block" />
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-image-container">
                                        <img src="images/pilot-partner-section-vector1.png" alt="vector1"
                                            class="img-fluid mx-auto d-block" />
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-image-container cutom-img">
                                        <img src="images/pilot-partner-section-vector2.png" alt="vector2"
                                            class="img-fluid mx-auto d-block" />
                                    </div>
                                </div>
                                {{-- <div class="card">
                                    <div class="card-image-container cutom-img">
                                        <img src="images/pilot-partner-section-vector3.png" alt="vector3"
                                            class="img-fluid mx-auto d-block" />
                                    </div>
                                </div> --}}
                                {{-- <div class="card">
                                    <div class="card-image-container cutom-img">
                                        <img src="images/pilot-partner-section-vector4.png" alt="vector4"
                                            class="img-fluid mx-auto d-block" />
                                    </div>
                                </div> --}}
                                <div class="card">
                                    <div class="card-image-container">
                                        <img src="images/pilot-partner-section-vector-5.png" alt="vector5"
                                            class="img-fluid mx-auto d-block" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('includes.testimonials')
        @include('includes.newsletter')
        @include('includes.footer')
    </div>
@stop
