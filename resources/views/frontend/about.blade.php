@extends('layouts.guest')


@section('page_title')
    About
@endsection

@section('head_import')
    <link rel="stylesheet" href="{{ asset('assets/css/inspection.css') }}">
@endsection



@section('content')
    <div>
        <div class="bg-header text-white text-center mb-5"
            style="position: relative; display: flex; align-content: center; justify-content: center">
            <img src="{{ asset('image/about-header.png') }}" class="img-fluid" alt="about header">
            <div class="content" style="position: absolute; top: 30%;">
                <span>About</span>
                <h1>Your Trusted Car Inspection Experts</h1>
            </div>
        </div>
    </div>

    <div class="container mt-5 ">
        <div class="row text-center ">
            <div class="col-12">
                <h5 style="color: #1970F1;">WHY CHOOSE US?</h5>
            </div>
            <div class="col-12">
                <h1> WHAT MAKE US DIFFERENT</h1>
            </div>
        </div>

        <div class="row justify-content-center mb-5 mt-4">
            <div class="col-md-4">
                <div class="card" >
                    <img src="{{ asset('image/about-card-1.png') }}" class="card-img-top" alt="card image">
                    <div class="card-body">
                        <h5 class="card-title">Customer Service</h5>
                        <span class="card-text" style="font-size: 12px;">Duis aute irure dolor in reprehenderit and
                            involuptate velit esse cillum dolore eu to ufugiatnulla pariatur.</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" >
                    <img src="{{ asset('image/about-card-2.png') }}" class="card-img-top" alt="card image">
                    <div class="card-body">
                        <h5 class="card-title">Product Quality</h5>
                        <span class="card-text" style="font-size: 12px;">Duis aute irure dolor in reprehenderit and
                            involuptate velit esse cillum dolore eu to ufugiatnulla pariatur.</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" >
                    <img src="{{ asset('image/about-card-3.png') }}" class="card-img-top" alt="card image">
                    <div class="card-body">
                        <h5 class="card-title">Distribution Network</h5>
                        <span class="card-text" style="font-size: 12px;">Duis aute irure dolor in reprehenderit and
                            involuptate velit esse cillum dolore eu to ufugiatnulla pariatur.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="background: #1970F1; margin: 40px auto; color: #fff" class="team-section">
        <div class="container">
            <div class="row p-5">
                <div class="col-md-6 mb-4">
                    <div class="content">
                        <h6 style="margin-bottom: 0;"> Meet Our Team</h6>
                        <h1>OUR TEAM</h1>
                        <p>
                            The car inspection team meticulously examines vehicles, ensuring safety and compliance with
                            regulations. With keen eyes and diagnostic tools, they detect even the smallest issues,
                            guaranteeing roadworthiness
                        </p>
                        <a href="" class="white-btn">View More</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-4">
                            <div class="content">
                                <img src="{{ asset('image/about-team-1.png') }}" style="border-radius: 10px;"
                                    class="img-fluid" alt="">
                                <div style="font-size: 17px; font-weight: 600" class="mt-2">Lorem Ipsum</div>
                                <p style="font-size: 12px;">Lorem ipsum dolor sit ametand to,
                                    consectetur adipiscing elit </p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="content">
                                <img src="{{ asset('image/about-team-2.png') }}" style="border-radius: 10px;"
                                    class="img-fluid" alt="">
                                <div style="font-size: 17px; font-weight: 600" class="mt-2">Lorem Ipsum</div>
                                <p style="font-size: 12px;">Lorem ipsum dolor sit ametand to,
                                    consectetur adipiscing elit </p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="content">
                                <img src="{{ asset('image/about-team-3.png') }}" style="border-radius: 10px;"
                                    class="img-fluid" alt="">
                                <div style="font-size: 17px; font-weight: 600" class="mt-2">Lorem Ipsum</div>
                                <p style="font-size: 12px;">Lorem ipsum dolor sit ametand to,
                                    consectetur adipiscing elit </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5 ">
        <div class="row text-center ">
            <div class="col-12">
                <h5 style="color: #1970F1;">OUR MISSION</h5>
            </div>
            <div class="col-12">
                <h1> Ensuring Your Safety, Every Mile</h1>
            </div>
        </div>
        <div class="row align-items-center mt-4 ">
            <div class="col-md-6 mb-5">
                <span style="font-size: 13px; margin-bottom: 20px;">
                    At Vinspek, our mission is simple yet profound: to ensure your safety and peace of mind with every inspection. We're committed to upholding the highest standards of quality, accuracy, and integrity in all our services. Our dedicated team of experts works tirelessly to provide thorough inspections, delivering detailed reports and recommendations that empower you to make informed decisions about your vehicle. Your safety is our priority, and we strive to exceed your expectations every step of the way
                </span>
                <div class="mt-4">
                    <a href="" class="theme-btn">Contact us </a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('image/mission-img.png') }}" class="img-fluid" alt="">
            </div>
        </div>
    </div>
@endsection
