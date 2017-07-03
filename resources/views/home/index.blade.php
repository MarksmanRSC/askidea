@extends('layouts.main')

@section('css')
    <style>
        .feature-center p, .feature-center ul {
            font-size: 1.25em;
        }

        .feature-center p, ul {
            color: #fff;
            font-size: 14px;
        }

        .feature-center:hover > span.icon img {
            border: 2px solid white;
        }

        .feature-center h3 {
            text-transform: uppercase;
            font-size: 18px;
            color: #efefef;
        }


        .feature-center:hover, .feature-center:hover > span.icon {
            box-shadow: 0 2px 40px 0 rgba(0, 0, 0, 0.6);
            -webkit-transform: translate3d(0, -10px, 0);
            transform: translate3d(0, -10px, 0);
        }

        .feature-center:hover > span.icon {
            box-shadow: 0 2px 40px 0 rgba(127, 127, 127, 0.6);
        }

        .feature-center {
            text-align: center;
            margin-top: 100px;
            background: #0288D1;
            padding: 15px;
            border-radius: 15px;
            -webkit-transition: all 0.2s ease;
            transition: all 0.2s ease;
            will-change: transform;
        }

        .feature-center .icon {
            width: 50px;
            height: 50px;
            background: #efefef;
            display: table;
            text-align: center;
            margin: -40px auto 0px auto;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            border-radius: 50%;
        }

        .feature-center:hover {
            box-shadow: 0 2px 40px 0 rgba(0, 0, 0, 0.6);
            -webkit-transform: translate3d(0, -10px, 0);
            transform: translate3d(0, -10px, 0);
        }

        .feature-center .icon i {
            display: table-cell;
            vertical-align: middle;
            /* height: 90px; */
            font-size: 20px;
            /* line-height: 40px; */
            color: #F85A16;
        }

        .feature-center ul {
            min-height: 13em;
            padding-left: 0;
            display: inline-block;
        }

        .fpCard ul li {
            list-style: none;
            padding-bottom: 8px;
        }

        .fpCard ul li span {
            margin: 0 8px;
        }

        .fpCard ul li img {
            width: 30px;
        }

        .fpCard .desc-row {
            margin-top: 16px;
        }

        .fpCard .bullet-row {
            margin-top: 16px;
        }
    </style>
@endsection

@section('js')
    <script>

    </script>
@endsection


@section('content')

    <div class="header">
        <div class="mobile">
            <img class="img-responsive" src="/assets/poster.png">
            <div class="overlay-desc">
                <div class="row">
                    <!-- <img class="img-responsive logo" src="./assets/img/400dpiLogo.png"> -->
                    <h1 class="title">Ask Idea Sourcing: Your affordable, reliable, and transparent sourcing agent.</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="desktop">
        <div class="video-container">
            <video autoplay loop muted poster="./assets/img/poster.png">
                <!-- <source src="./assets/headerVideo.mp4" type="video/mp4"> -->
                <source src="/assets/headerVideo_edit.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="overlay-desc">
                <!-- <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <img class="img-responsive logo" src="./assets/img/400dpiLogo.png">
                </div>
                </div> -->

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- <img class="img-responsive logo" src="./assets/img/400dpiLogo.png"> -->
                        <h1 class="title">Ask Idea Sourcing</h1>
                        <h2>Your affordable, reliable, transparent sourcing agent</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="container" style="padding-top: 72px;">


        <div class="text-center"
             style="font-size: 2.0em; font-weight: lighter; padding: 1em; border: 1px solid #fff; margin-top: .5em; color: #fff;">
            <h1 style="margin-top: 0">SCALE your business.</h1>
            <p>
                You've laid the groundwork. Your business is humming. Now, it's time
                to take it to the next level. <strong>Ask Idea</strong> is the
                valued partner that helps you scale up and increase your profit.
                Our product sourcing and logistics services ensure that you can
                deliver quality product while creating undeniable efficiencies
                that directly impact your growth.
            </p>

        </div>


        <div class="row row-table">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="feature-center animate-box fadeIn animated-fast fpCard" data-animate-effect="fadeIn">
                        <span class="icon"> <img src="/img/column1.png">
                            <!-- <i class="fa fa-plus" aria-hidden="true"></i> --> </span>
                    <div class="row title-row">
                        <div class="col-xs-12">
                            <h3>Level 1</h3>
                        </div>
                    </div>
                    <div class="row desc-row" style="height: 50px;">
                        <div class="col-xs-12 text-center">
                            <p>Private Label &amp; Sourcing Research</p>
                        </div>
                    </div>
                    <div class="row bullet-row">
                        <div class="col-xs-12">
                            <ul style="text-align: left;">
                                <li>
                                    <span><img src="{{asset('img/icons/services/product_consultation.svg')}}"
                                           alt="product_consultation"></span>
                                    <span>Product Consultation</span>
                                </li>
                                <li>
                                <span><img src="{{asset('img/icons/services/supplier_assessment.svg')}}"
                                           alt="supplier_assessment"></span>
                                    <span>Supplier Assessment</span>
                                </li>
                                <li>
                                    <span><img src="{{asset('img/icons/services/sampling.svg')}}"
                                               alt="sampling">
                                    </span><span>Sampling</span>
                                </li>
                                <li>
                                    <span><img src="{{asset('img/icons/services/industry_regulations.svg')}}"
                                               alt="industry_regulations"></span>
                                    <span>Industry Regulations</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="price">
                        $99
                    </div>
                    <p>
                        <a href="{{ url('/service#level1') }}" class="btn btn-primary">Learn More</a>
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="feature-center animate-box fadeIn animated-fast fpCard" data-animate-effect="fadeIn">
                        <span class="icon"> <img src="/img/column2.png">
                            <!-- <i class="fa fa-plus" aria-hidden="true"></i> --> </span>
                    <div class="row title-row">
                        <div class="col-xs-12">
                            <h3>Level 2</h3>
                        </div>
                    </div>
                    <div class="row desc-row" style="height: 50px;">
                        <div class="col-xs-12 text-center">
                            <p>Price Negotiation & Procurement Managemen</p>
                        </div>
                    </div>
                    <div class="row bullet-row">
                        <div class="col-xs-12">
                            <ul style="text-align: left;">
                                <li>
                                    <span><img src="{{asset('img/icons/services/inspection.svg')}}"
                                           alt="inspection"></span>
                                    <span>Inspection</span>
                                </li>
                                <li>
                                    <span><img src="{{asset('img/icons/services/procurement.svg')}}"
                                           alt="procurement"></span>
                                    <span>Procurement</span>
                                </li>
                                <li>
                                    <span><img src="{{asset('img/icons/services/payment.svg')}}"
                                           alt="payment"></span>
                                    <span>payment</span>
                                </li>
                                <li>
                                    <span><img src="{{asset('img/icons/services/order_monitoring.svg')}}"
                                           alt="order_monitoring"></span>
                                    <span>Order Monitoring</span>
                                </li>
                                <li>
                                    <span><img src="{{asset('img/icons/services/logistics.svg')}}"
                                           alt="logistics"></span>
                                    <span>Logistics</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="price">
                        $300
                    </div>
                    <p>
                        <a href="{{ url('/service#level2') }}" class="btn btn-primary">Learn More</a>
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="feature-center animate-box fadeIn animated-fast fpCard" data-animate-effect="fadeIn">
                        <span class="icon"> <img src="/img/column3.png">
                            <!-- <i class="fa fa-plus" aria-hidden="true"></i> --> </span>
                    <div class="row title-row">
                        <div class="col-xs-12">
                            <h3>Level 3</h3>
                        </div>
                    </div>
                    <div class="row desc-row" style="height: 50px;">
                        <div class="col-xs-12 text-center">
                            <p>A suite of solutions, with end-to-end support.</p>
                        </div>
                    </div>
                    <div class="row bullet-row">
                        <div class="col-xs-12">
                            <ul style="text-align: left; padding: 0 32px;">
                                <li>
                                    Our experienced staff will assist you in all your sourcing needs from start to finish
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="price">
                        $450
                    </div>
                    <p>
                        <a href="{{ url('/service#level3') }}" class="btn btn-primary">Learn More</a>
                    </p>
                </div>
            </div>


        </div>
    </div>




@endsection