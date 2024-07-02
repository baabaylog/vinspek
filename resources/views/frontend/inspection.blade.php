@extends('layouts.guest')


@section('page_title')
    Inspection
@endsection

@section('head_import')
    <link rel="stylesheet" href="{{ asset('assets/css/inspection.css') }}">
@endsection


@section('content')
    <div class="container-fluid " style="margin-bottom: 100px">
        <div class="row my-5 text-white" style="background: #1970F1;">
            <div class="col-12">
                <div class="d-flex">
                    <img src="{{ asset('image/contact-page-vinspek-trans-logo.png') }}" style="width:60%; margin-top:-70px "
                        alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-5">

                    <h1 style="font-size: 3.5rem">Ensuring Safety & Reliability</h1>
                    <p>Explore our comprehensive car inspection services designed to ensure safety and reliability on the
                        road. Our expert team meticulously examines every detail of your vehicle, providing you with
                        thorough reports and peace of mind</p>
                </div>
            </div>
            <div class="col-md-6 p-0">
                <img src="{{ asset('image/contact-page-car.png') }}" class="img-fluid" style="margin-bottom: -70px"
                    alt="">
            </div>
        </div>
    </div>
    @session('message')
        <div class="container">
            <div class="row">
                <div class="alert alert-info" role="alert">
                    {{ session('message') }}
                </div>
            </div>
        </div>
    @endsession
    <div class="container my-5 pt-5">
        <div class="row">
            <div class="col-12 mb-4">
                <h4>VEHICLE TO BE INSPECTED</h4>
            </div>
            <div class="col-md-8">

                <div class="row">
                    <div class="col-12 mb-2">
                        <span class="">Is this form showing info from a previous order? <a href="#"
                                style="color: red; text-decoration: underline;">Reset This Form</a> </span>
                    </div>
                    <div class="col-12">
                        {{-- VIN FORM --}}
                        <div class="p-4 border_20 bg-light">
                            <form onsubmit="getCarData(event)" >
                                <div class="mb-4 ">
                                    <label class=" mb-2 d-block" style="font-weight: 600"> Enter VIN no:</label>
                                    <input type="text" name="vin_number" oninput="add_vin_bumber(event)"  class="inspection_input">
                                </div>
                                <button type="submit" class="inspection_btn">submit</button>
                            </form>

                        </div>
                    </div>

                    <form class="col-12" method="POST" action="{{ route('create_order')}}" id="order-form">
                        @csrf
                        {{-- inpsection detail form --}}
                        <div class="p-4 border_20 mt-3 bg-light">
                            <div class="row ">
                                <div class="col-4 mb-4 px-4">
                                    <label class=" mb-2 d-block"  style="font-weight: 600"> Year</label>
                                    <input type="text" name="year" style="width:130px;" placeholder="2012"
                                        class="inspection_input">
                                        <input type="hidden" name='vin_number'  >
                                        <input type="hidden" name='plan_id' value="{{ $plain->id }}"  >
                                </div>
                                <div class="col-4 mb-4 px-4">
                                    <label class=" mb-2 d-block" style="font-weight: 600"> Make</label>
                                    <input type="text" name="make" style="width:130px;" placeholder="Honda"
                                        class="inspection_input">
                                </div>
                                <div class="col-4 mb-4 px-4">
                                    <label class=" mb-2 d-block" style="font-weight: 600"> Model</label>
                                    <input type="text" name="model" style="width:130px;" placeholder="Accord"
                                        class="inspection_input">
                                </div>

                                <div class="col-6 mb-4 px-4">
                                    <label class="mb-2 d-block">DealerShip Name</label>
                                    <input type="text" name="dealership_name" style="width: 100%;"
                                        class="inspection_input">
                                </div>
                                <div class="col-6 mb-4 px-4">
                                    <label class="mb-2 d-block">Stock Number</label>
                                    <input type="text" name="stock_number" style="width: 100%;"
                                        class="inspection_input">
                                </div>
                                <div class="col-6 mb-4 px-4">
                                    <label class="mb-2 d-block">Sellers Contact</label>
                                    <input type="text" name="seller_contact" style="width: 100%;"
                                        class="inspection_input">
                                </div>
                           
                                <div class="col-6 mb-4 px-4">
                                    <label class="mb-2 d-block">Adress Permanent</label>
                                    <input type="text" name="address_permanent" style="width: 100%;"
                                        class="inspection_input">
                                </div>
                                <div class="col-12 mb-4 px-4">
                                    <label class="mb-2 d-block">Select Date & Time</label>
                                    <input type="datetime" name="date" style="width: 100%;"
                                        class="inspection_input">
                                </div>
                                <div class="col-12 mb-4 px-4">
                                    <textarea 
                                        style="width: 100%; border-radius: 10px; border: 1px solid #d3d3d3d3; padding: 10px 20px; outline: none;" name="note"
                                        rows="7"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row my-5">
                            <div class="col-12 mb-4">
                                <h4>INSPECTION ADD-ONNS</h4>
                            </div>
                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <span class="">You can add any of the following add-ons to your order!
                                        </span>
                                    </div>
                                    <div class="col-12">

                                        <div class="p-4 border_20 bg-light">
                                            <ul>
                                                <li class="d-flex ">
                                                    <input type="checkbox">
                                                    <span class="ps-3" style="color: rgb(182, 181, 181)">$34.99 - CARFAX
                                                        Vehicle
                                                        History
                                                        Report</span>
                                                </li>
                                                <li class="d-flex ">
                                                    <input type="checkbox">
                                                    <span class="ps-3" style="color: rgb(182, 181, 181)">$49.99 - Verbal
                                                        Vehicle
                                                        Assessment Report </span>
                                                </li>
                                            </ul>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-4">
                                <h4>BUYER INFORMATION</h4>
                            </div>
                            <div class="col-12">

                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <span class="">We ask for a minimal amount of information because we respect
                                            your privacy.
                                        </span>
                                    </div>
                                    <div class="col-12">

                                        <div class="p-4 border_20 mt-3 bg-light">
                                            <div class="row">

                                                <div class="col-6 mb-4 px-4">
                                                    <label class="mb-2 d-block">First Name</label>
                                                    <input type="text" name="first_name" style="width: 100%;"
                                                        class="inspection_input">
                                                        <input type="hidden" name="user_type" value="customer" >
                                                </div>
                                                <div class="col-6 mb-4 px-4">
                                                    <label class="mb-2 d-block">Last Name</label>
                                                    <input type="text" name="last_name" style="width: 100%;"
                                                        class="inspection_input">
                                                </div>
                                                <div class="col-6 mb-4 px-4">
                                                    <label class="mb-2 d-block">Email</label>
                                                    <input type="text" name="email" style="width: 100%;"
                                                        class="inspection_input">
                                                </div>
                                                <div class="col-6 mb-4 px-4">
                                                    <label class="mb-2 d-block">Your Phone</label>
                                                    <input type="text" name="phone" style="width: 100%;"
                                                        class="inspection_input">
                                                </div>
                                                <div class="col-12 mb-4 px-4">
                                                    <label class="mb-2 d-block">Credit Card number</label>
                                                    <input type="text" name="card_number" style="width: 100%;"
                                                        class="inspection_input">
                                                </div>

                                                <div class="col-4 mb-4 px-4">
                                                    <label class=" mb-2 d-block" style="font-weight: 600"> MM/YY </label>
                                                    <input type="text" style="width:130px;" name="mm" class="inspection_input">
                                                </div>
                                                <div class="col-4 mb-4 px-4">
                                                    <label class=" mb-2 d-block" style="font-weight: 600"> CVV</label>
                                                    <input type="text" style="width:130px;" name="cvv" class="inspection_input">
                                                </div>
                                                <div class="col-4 mb-4 px-4">
                                                    <label class=" mb-2 d-block" style="font-weight: 600"> Your Postal
                                                        Code</label>
                                                    <input type="text" style="width:130px;" name="postal_code" class="inspection_input">
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="row mt-5">
                            <div class="col-12 mb-2">
                                <label class="d-flex mb-3">
                                    <input type="checkbox">
                                    <span class="ps-3">I have READ and AGREE to the <b> Terms and Conditions </b> </span>
                                </label>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="theme-btn"> Submit </button>
                            </div>
                        </div>
                    </form>

                </div>


            </div>
            <div class="col-md-4 mt-4">
                <div class="row">
                    <div class="col-12 text-white">
                        <div style="background: #1970F1; border-radius: 10px; padding:20px 10px;">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center justify-content-between">
                                    <svg width="72" height="72" viewBox="0 0 72 72" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <rect width="72" height="72" fill="url(#pattern0_542_1930)" />
                                        <defs>
                                            <pattern id="pattern0_542_1930" patternContentUnits="objectBoundingBox"
                                                width="1" height="1">
                                                <use xlink:href="#image0_542_1930" transform="scale(0.00195312)" />
                                            </pattern>
                                            <image id="image0_542_1930" width="512" height="512"
                                                xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAgAAAAIACAMAAADDpiTIAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDcuMS1jMDAwIDc5LmRhYmFjYmIsIDIwMjEvMDQvMTQtMDA6Mzk6NDQgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCAyMi41IChXaW5kb3dzKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpDMThGNjI2OTAzNzMxMUVGQTZFREVGNDY4NjlFQTExRiIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpDMThGNjI2QTAzNzMxMUVGQTZFREVGNDY4NjlFQTExRiI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkMxOEY2MjY3MDM3MzExRUZBNkVERUY0Njg2OUVBMTFGIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkMxOEY2MjY4MDM3MzExRUZBNkVERUY0Njg2OUVBMTFGIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+ZbfT2gAAAAZQTFRF////////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" />
                                        </defs>
                                    </svg>
                                    <h6> {{ $plain->name }} <br> inspection </h6>
                                </div>
                                <div>
                                    <span>$ {{ $plain->price }} </span>
                                </div>
                            </div>
                            <div class="justify-content-between d-flex mt-3">
                                <div>Sub Total:</div>
                                <div>
                                    <span> ${{ $plain->price }} </span>
                                </div>
                            </div>
                            <hr style="border: 1px solid lightgray; padding: 7px auto ">
                            <div class="justify-content-between d-flex mt-3">
                                <div>Total:</div>
                                <div>
                                    <span> ${{ $plain->price }} </span>
                                </div>
                            </div>
                            <div>
                                <small style="color: lightgray; font-size: 10px">{{ $plain->description }}</small>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row mt-5 ">
                    <div class="col-12 text-white">
                        <div style="background: #1970F1; border-radius: 10px; padding:20px 10px;">
                            <div class="mb-4 d-flex align-items-center">
                                <div>
                                    <h6> Inspection Details </h6>
                                </div>
                            </div>
                            <div class="text-center">
                                <span style="color: #fff; font-size: 13px">Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Pellentesque eget justo luctus </span>
                            </div>
                            <div class=" my-3">
                                <div class="row g-2">
                                    <div class="col-8">
                                        <img src="{{ asset('image/inspection-detail-img-1.png') }}" class="img-fluid"
                                            alt="">
                                    </div>
                                    <div class="col-4">
                                        <img src="{{ asset('image/inspection-detail-img-2.png') }}"
                                            class=" h-100 img-fluid" alt="">
                                    </div>

                                    <div class="col-8">
                                        <img src="{{ asset('image/inspection-detail-img-3.png') }}" class="img-fluid"
                                            alt="">
                                    </div>
                                    <div class="col-4">
                                        <img src="{{ asset('image/inspection-detail-img-4.png') }}"
                                            class=" h-100 img-fluid" alt="">
                                    </div>
                                </div>

                            </div>
                            <div class="text-center">
                                <span style="color: #fff; font-size: 13px">Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Pellentesque eget justo luctus </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('foot_import')
    <script>
        
        const orderForm = $('#order-form');

        function add_vin_bumber(e){
            var vin_no = e.target.value;
            // console.log(orderForm.find('input[name=vin_number]'), vin_no)
            orderForm.find('input[name=vin_number]').val(vin_no)
        }

        function getCarData(e) {
            e.preventDefault();

            const form = e.target;
            const vin_number = $(form).find('input[name=vin_number]').val()

            $.ajax({
                'url': "{{ route('car_info') }}",
                'type': "POST",
                'data': {vin_number},
                'headers':{
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                },
                success: (res) =>{
                    console.log(res)
                    orderForm.find('input[name=year]').val(res.response.year)
                    orderForm.find('input[name=make]').val(res.response.make)
                    orderForm.find('input[name=model]').val(res.response.model)
                }
            })
         


        }
    </script>
@endsection
