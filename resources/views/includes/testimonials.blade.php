<div class="testi-section">
            <div class="container">
                <div class="text-center">
                    <span class="sub-title text-uppercase d-block mb-2">Testimonials</span>
                    <h2>Check What Our Pilots and Subscribers Are Saying</h2>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="slider testi-image-slider">
                            @foreach($testimonials ?? array() as $testimonial)
                            <div>
                                <img src="{{ $testimonial->getFirstMediaUrl('images', 'thumb') }}" class="img-fluid">
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="slider testi-review-text mt-4">
                        @foreach($testimonials ?? array() as $testimonial)
                            <div>
                                <div class="qoute-img mb-3">
                                    <img src="{{url('images/qoute.png')}}">
                                </div>
                                <div class="stars-img mb-3">
                                    <div class="stars">
                                        @for($st=1; $st <= 5; $st++)
                                            <span class="starts fa fa-star {{ ($testimonial->star_rating >= $st ? 'text-warning':'') }}"></span>
                                        @endfor
                                    </div>
                                </div>
                                <p class="mb-5">{{ $testimonial->body }}</p>
                                <div class="d-flex justify-content-between">
                                    <div class="text">
                                        <strong style="font-size: 20px" class="testi-strong-text">{{ $testimonial->client_name }}</strong>
                                        <span>{{ $testimonial->designation }}</span>
                                    </div>
                                    <div class="icon">
                                        <img  style="width: 46px; height:46px;" class="img-fluid" src="{{ $testimonial->getFirstMediaUrl('company_logo', 'thumb') }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>