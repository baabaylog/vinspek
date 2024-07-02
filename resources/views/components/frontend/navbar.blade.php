<!---Top bar -->
<div class="global-bg top-bar" style="width: 100%; ">
    <div class="container">
        <div class="row g-0 py-1">
            <div class="col-6">
                <ul class=" contact-info d-flex text-white mb-0">
                    <li>
                        <img src="{{ asset('image/vector.png')}}" alt="">
                        <span>1+12 345 6789 0</span>
                    </li>
                    <li>
                        <img src="{{asset('image/email.png')}}" alt="">
                        <span>support@vinspek.com</span>
                    </li>
                </ul>
            </div>
            <div class="col-6">
                <ul class=" social-icons  d-flex  m-auto" style="justify-content: end;">
                    <li>
                        <img src="{{asset('image/insta-icon.png')}}" alt="">
                    </li>
                    <li>
                        <img src="{{asset('image/facebook-icon.png')}}" alt="">
                    </li>
                    <li>
                        <img src="{{asset('image/twitter-icon.png')}}" alt="">
                    </li>
                    <li>
                        <img src="{{asset('image/linkedin-icon.png')}}" alt="">
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

{{-- Navbar  --}}
<nav class="navbar navbar-expand-lg ">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="{{ asset('image/logo.png') }}" alt=""></a>
        <div class="row  d-md-none ">
            <div class="col">
                <a href="" style="font-size: 11px;">Sign in</a>
                <a href="#pricing-section"  class="theme-btn-sm ms-2">Sign up</a>
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0 flex-wrap">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/"> Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('about') }}"> About </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#"> Features </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#"> Solutions </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#"> Pricing </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('contact') }}"> Contact </a>
                </li>
            </ul>
        </div>
        <div class="row d-none d-md-flex ">
            <div class="col">
                <a href="#">Sign in</a>
                <a href="#pricing-section" class="theme-btn ms-2">Sign up</a>
            </div>
        </div>
    </div>
</nav>
