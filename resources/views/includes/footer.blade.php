<footer id="footer">
    <div class="container">
        <div class="footer-holder">
            <div class="row">
                <div class="col-12 col-md-4 mb-4">
                    <div class="footer-logo mb-3">
                        <a href="#"><img src="images/logo.png" class="img-fluid"></a>
                    </div>
                    <p class="mb-3 text-center text-md-start">Simple innate summer fat appear basket his desire joy.</p>
                    <ul class="social-icons list-unstyled d-flex align-items-center justify-content-center">
                        <li><a href="#"><img src="images/social01.png"></a></li>
                        <li><a href="#"><img src="images/social02.png"></a></li>
                        <li><a href="#"><img src="images/social03.png"></a></li>
                        <li><a href="#"><img src="images/social04.png"></a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-2 mb-3">
                    <strong class="footer-title mb-4 d-block">Home</strong>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        {{-- <li><a href="{{url('/blogs')}}">Community</a></li>
                        <li><a href="{{url('/case-studies')}}">Events</a></li>
                        <li><a href="{{url('/contact-us')}}">Contact</a></li> --}}
                    </ul>
                </div>
                <div class="col-6 col-md-2 mb-3">
                    <strong class="footer-title mb-4 d-block">Services</strong>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/demo') }}">Demo</a></li>
                        <li><a href="{{ url('/subscribers') }}">Subscribers</a></li>
                        <li><a href="{{ url('/pilot') }}">Traders</a></li>
                        <li><a href="{{ url('/strategy') }}">Strategies</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-2 mb-3">
                    <strong class="footer-title mb-4 d-block">Resources</strong>
                    <ul class="list-unstyled">
                        <li><a href="/faqs">FAQs</a></li>
                        <li><a href="/case-studies">Case Studies</a></li>
                        <li><a href="{{ url('/partners') }}">Partners</a></li>
                        <li><a href="/about-us">About Us</a></li>
                        <li><a href="/contact-us">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-2 mb-3">
                    <strong class="footer-title mb-4 d-block">Community</strong>
                    <ul class="list-unstyled">
                        <li><a href="/blogs">Blog</a></li>
                        <li><a href="#">Discord</a></li>
                        <li><a href="#">Telegram</a></li>
                        {{-- <li><a href="#">Private Group</a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <p class="m-0">Copyright @ <a href="{{ url('/') }}">StockPilot</a> {{ date('Y') }}. All Rights
                Reserved.</p>
        </div>
    </div>
</footer>
