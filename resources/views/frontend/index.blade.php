@extends('layouts.guest')


@section('page_title')
    Home
@endsection

@section('head_import')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row banner">
            <div class="col-12 order-2 order-md-1 col-md-6">
                <div class="content">
                    <h1>Accompany your <br><span class="highlighted">journey with comfort</span></h1>
                    <p>Embark on your journey with peace of mind. Our comprehensive car inspection services ensure your
                        vehicle is road-ready, so you can travel with confidence and comfort</p>
                    <a href="#" class="theme-btn">About Us</a>
                </div>
            </div>
            <div class="col-12 order-1 order-md-2  col-md-6">
                <div class="banner-img" style="position: relative;">
                    <div class="banner-bg-img">
                        <img src="image/ornament.png" class="img-fluid" alt="Image">
                    </div>
                    <div class="banner-car-img">
                        <img src="image/contact-page-car.png" style="position: absolute; bottom:0; right:0;"
                            class="img-fluid" alt="Image">
                    </div>
                </div>

            </div>
        </div>
        <div class="row  justify-content-center py-5 banner-search">
            <div class="col col-md-10">
                <div class="search-round-box">
                    <form action="" class="d-flex align-items-center">
                        <input type="text" class="search-input" placeholder="Search with VIN">
                        <button class="theme-btn " style=" white-space: nowrap; ">Inspect Now</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    {{-- About us section --}}

    <div class="container-fluid global-bg my-5 ">
        <div class="p-5">

            <div class="row text-white justify-content-center ">
                <div class="col-12 text-center">
                    <h5> ABOUT US</h5>
                </div>
                <div class="col-12 text-center mb-5">
                    <h2> Who We Are? </h2>
                </div>
                <div class="col-md-10">
                    <div class="row align-items-center ">
                        <div class="col-md-6 order-2 order-md-1 ">
                            <p class="pt-3">
                                At Vinspek, we're dedicated to ensuring the safety and reliability of every vehicle on the
                                road.
                                With a team of highly skilled professionals and state-of-the-art equipment, we specialize in
                                providing comprehensive and reliable car inspection services tailored to meet your needs.
                                Our
                                commitment to excellence extends beyond the inspection process; we prioritize transparency,
                                integrity, and customer satisfaction in everything we do. Trust us for thorough inspections
                                and
                                exceptional service that exceeds expectations
                            </p>
                            <button type="submit" class="white-btn">Subscribe</button>
                        </div>
                        <div class="col-md-6 order-1 order-md-2">
                            <img src="{{ asset('image/about-sec.png') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row text-center">
            <h6 style="color: #007bff; font-weight: 700;">Exclusive Features</h6>
        </div>
        <div class="row text-center justify-content-center mb-5">
            <div class="col-12">
                <h2>Explore Our Signature Features</h2>
            </div>
            <div class="col-md-7">
                <p style="color: rgba(0, 0, 0, 0.841); font-size: 13px;  ">Explore the unique benefits and exclusive
                    features that set Vinspek apart from the rest. From our comprehensive inspection reports to our
                    personalized service, discover why customers trust us for their car inspection needs</p>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <img src="{{ asset('image/signature-sec.png') }}" class="img-fluid" alt="">
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row mb-4">
            <h2>How Vinspek Car’s Inspection Work</h2>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="d-flex align-items-center">
                    <span class="point-marks">
                        <div>1</div>
                    </span>
                    <span class="p-3">Make a booking online for the car inspection service</span>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="d-flex align-items-center">
                    <span class="point-marks">
                        <div>2</div>
                    </span>
                    <span class="p-3">Book a time and place for the car inspection
                        service</span>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="d-flex align-items-center">
                    <span class="point-marks">
                        <div>3</div>
                    </span>
                    <span class="p-3">Qualified mechanics will visit the vehicle owner
                        and conduct the inspection.</span>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="d-flex align-items-center">
                    <span class="point-marks">
                        <div>4</div>
                    </span>
                    <span class="p-3">Your detailed vehicle inspection report will be sent via SMS & emailed to you
                        within an hour of the inspection</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid my-5 global-bg">
        <div class="row">
            <img src="{{ asset('image/do-sec-first.png') }}" style="width: 250px" alt="">
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('image/do-sec.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-6 text-white mt-2 ">
                        <h6>Tailored Solutions</h6>
                        <h2>WHAT WE DO?</h2>
                        <p>Car inspection involves a comprehensive check of a vehicle's safety and emissions compliance. It
                            includes visual examinations of exterior and interior components, functional tests, emissions
                            testing, and computer diagnostics to ensure roadworthiness. Results determine if the vehicle
                            passes or requires repairs to meet regulatory standards.
                        </p>
                        <div class="pt-4">
                            <img src="{{ asset('image/do-sec-report.png') }}" class="w-50" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-end ">
            <img src="{{ asset('image/do-sec-last.png') }}" style="width: 250px" alt="">
        </div>

    </div>

    <div class="container" id="pricing-section">
        <div class="row text-center">
            <h6 style="color: #007bff; font-weight: 700;">PRICING PLANS</h6>
        </div>
        <div class="row text-center justify-content-center mb-5">
            <div class="col-12">
                <h2>PURCHASE USED CAR INSPECTION</h2>
            </div>
            <div class="col-md-7">
                <p style="color: rgba(0, 0, 0, 0.841); font-size: 13px;  ">At Vinspek, we believe in providing transparent
                    and affordable pricing plans to suit your needs. Choose from our range of options designed to offer
                    flexibility and value</p>
            </div>
        </div>
        @if (count($customerPlains) == 3 ) 
        <div class="row mb-5">
            <div class="col-md-4 mb-3">
                <div class="card" style="border: 1px solid rgba(211, 211, 211, 0.631);">
                    <div class="card-body">
                        <span class="light-desc">{{ $customerPlains[0]->name }}</span>
                        <h2>$  {{  $customerPlains[0]->price}}</h2>
                        <span class="light-desc"> {{ $customerPlains[0]->description }} </span>
                        <hr style="border: 1px solid lightgray; margin-bottom: 20px;" />
                        <div class="my-3 pb-3">
                            <h5 class="mb-3">Features included: </h5>
                            <ul class="my-2">
                                @foreach ($customerPlains[0]->features as $feature)
                                <li class="d-flex mb-3 align-items-center">
                                    <span class="check">
                                        <div> ✔ </div>
                                    </span>
                                    <span class="point"> {{ $feature }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <a href="{{ route('inspection', [ 'plain_id' => $customerPlains[0]->id ]) }}" class="plains-btn card-link">Get plain</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card blue-card" style="border: 1px solid rgba(211, 211, 211, 0.631); background: #007bff;">
                    <div class="card-body">
                        <span class="light-desc text-white">  {{ $customerPlains[1]->name }} </span>
                        <h2>$ {{ $customerPlains[1]->price }} </h2>
                        <span class="light-desc text-white"> {{ $customerPlains[1]->description }}
                        </span>
                        <hr style="border: 1px solid lightgray; margin-bottom: 20px;" />
                        <div class="my-3 pb-3">
                            <h5 class="mb-3">Features included: </h5>
                            <ul class="my-2">
                                @foreach ($customerPlains[1]->features as $feature)
                                <li class="d-flex mb-3 align-items-center">
                                    <span class="check">
                                        <div> ✔ </div>
                                    </span>
                                    <span class="point"> {{ $feature }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <a href="{{ route('inspection', [ 'plain_id' => $customerPlains[1]->id ]) }}" class="plains-btn card-link">Get plain</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card" style="border: 1px solid rgba(211, 211, 211, 0.631);">
                    <div class="card-body">
                        <span class="light-desc"> {{ $customerPlains[2]->name }} </span>
                        <h2>$  {{ $customerPlains[2]->price }} </h2>
                        <span class="light-desc"> {{ $customerPlains[2]->description }}
                        </span>
                        <hr style="border: 1px solid lightgray; margin-bottom: 20px;" />
                        <div class="my-3 pb-3">
                            <h5 class="mb-3">Features included: </h5>
                            <ul class="my-2">
                                @foreach ($customerPlains[2]->features as $feature)
                                <li class="d-flex mb-3 align-items-center">
                                    <span class="check">
                                        <div> ✔ </div>
                                    </span>
                                    <span class="point"> {{ $feature }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <a href="{{ route('inspection', [ 'plain_id' => $customerPlains[2]->id ]) }}" class="plains-btn card-link">Get plain</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="container-fluid my-5 global-bg">
        <div class="container">
            <div class="row p-5 text-white align-items-center">
                <div class="col-12">
                    <h6>TESTIMONIALS</h6>
                </div>
                <div class="col-md-6">
                    <h2 style="font-size:3rem;">
                        What people say after used our service
                    </h2>
                </div>
                <div class="col-md-6">
                    <p>
                        Uncover the voices of our delighted customers, as they share their experiences with Vinspek's
                        unparalleled service. Their testimonials reflect our commitment to excellence and customer
                        satisfaction, guiding you towards making the right choice for your car inspection needs
                    </p>
                </div>
            </div>
            <div class="row pb-3 ">
                <div class="testimonials-home-page">

                    <div class="card bg-white border-0" style="width:25rem ; border-radius: 20px;">
                        <div class="card-body">
                            <span style="font-size:14px;" class="lignt-desc">Vinspek provided an excellent inspection
                                service for my recent
                                car purchase. The report was detailed and comprehensive, helping me make an informed
                                decision. Highly recommended!</span>
                            <div class="row mt-3">
                                <div class="col-3">
                                    <img src="{{ asset('image/testimonial-1.png') }}" class="img-fluid rounded"
                                        alt="">
                                </div>
                                <div class="col-9">
                                    <h4 class='mb-0'> Jaden Henderson</h4>
                                    <span style="font-size: 12px; font-weight: 600;">Ash Dr. San Jose, South
                                        Dakota</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-white border-0" style="width:25rem ; border-radius: 20px;">
                        <div class="card-body">
                            <span style="font-size:14px;" class="lignt-desc">Vinspek provided an excellent inspection
                                service for my recent
                                car purchase. The report was detailed and comprehensive, helping me make an informed
                                decision. Highly recommended!</span>
                            <div class="row mt-3">
                                <div class="col-3">
                                    <img src="{{ asset('image/testimonial-2.png') }}" class="img-fluid rounded"
                                        alt="">
                                </div>
                                <div class="col-9">
                                    <h4 class='mb-0'> Jaden Henderson</h4>
                                    <span style="font-size: 12px; font-weight: 600;">Ash Dr. San Jose, South
                                        Dakota</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-white border-0" style="width:25rem ; border-radius: 20px;">
                        <div class="card-body">
                            <span style="font-size:14px;" class="lignt-desc">Vinspek provided an excellent inspection
                                service for my recent
                                car purchase. The report was detailed and comprehensive, helping me make an informed
                                decision. Highly recommended!</span>
                            <div class="row mt-3">
                                <div class="col-3">
                                    <img src="{{ asset('image/testimonial-3.png') }}" class="img-fluid rounded"
                                        alt="">
                                </div>
                                <div class="col-9">
                                    <h4 class='mb-0'> Jaden Henderson</h4>
                                    <span style="font-size: 12px; font-weight: 600;">Ash Dr. San Jose, South
                                        Dakota</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-white border-0" style="width:25rem ; border-radius: 20px;">
                        <div class="card-body">
                            <span style="font-size:14px;" class="lignt-desc">Vinspek provided an excellent inspection
                                service for my recent
                                car purchase. The report was detailed and comprehensive, helping me make an informed
                                decision. Highly recommended!</span>
                            <div class="row mt-3">
                                <div class="col-3">
                                    <img src="{{ asset('image/testimonial-4.png') }}" class="img-fluid rounded"
                                        alt="">
                                </div>
                                <div class="col-9">
                                    <h4 class='mb-0'> Jaden Henderson</h4>
                                    <span style="font-size: 12px; font-weight: 600;">Ash Dr. San Jose, South
                                        Dakota</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="container my-5">
        <div class="row text-center">
            <h6 style="color: #007bff; font-weight: 700;">GET IN TOUCH</h6>
        </div>
        <div class="row text-center justify-content-center mb-5">
            <div class="col-12">
                <h2>Let's Connect and Get Started Today!</h2>
            </div>
            <div class="col-md-7">
                <p style="color: rgba(0, 0, 0, 0.841); font-size: 13px;  ">Have a question or need assistance? We're here
                    to help! Feel free to reach out to our friendly team for any inquiries, booking requests, or additional
                    information. We're dedicated to providing exceptional service and are ready to assist you every step of
                    the way</p>
            </div>
        </div>
        <div class="row justify-content-center ">
            <div class="col text-center ">
                <button class="theme-btn">Contact us</button>
            </div>
        </div>
    </div>
@endsection


@section('foot_import')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $('.testimonials-home-page').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            // dots:true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]

        });
    </script>
@endsection
