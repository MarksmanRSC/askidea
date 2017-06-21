@extends('layouts.main')

@section('content')

<div class="desktop">
    <div class="video-container">
        <video autoplay loop muted poster="./assets/img/poster.png">
            <!-- <source src="./assets/headerVideo.mp4" type="video/mp4"> -->
            <source src="/assets/headerVideo.mp4" type="video/mp4">
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

<div class="container"></div>
<div class="container-fluid" style="clear: both; margin-top: 4em;">

</div>
<div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="feature-center animate-box fadeIn animated-fast fpCard" data-animate-effect="fadeIn">
                    <span class="icon"> <img src="/img/column1.png"> <!-- <i class="fa fa-plus" aria-hidden="true"></i> --> </span>
                    <h3>Level 1</h3>
                    <p>
                        Private Label &amp; Sourcing Research
                    </p>
                    <ul style="text-align: left;">
                        <li>
                            Product Consultation
                        </li>
                        <li>
                            Supplier Assessment
                        </li>
                        <li>
                            Sampling (Optional)
                        </li>
                        <li>
                            Industry Regulations (Optional)
                        </li>
                        <li>
                            Supplier Qualification (Optional)
                        </li>
                    </ul>
                    <div class="price">
                        $99
                    </div>
                    <p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#contactUs">Contact Us</a>
                        <!-- <a href="#" class="btn btn-primary" onClick="RedmineHelpdeskWidget.toggle()">Contact Us</a> -->
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="feature-center animate-box fadeIn animated-fast fpCard" data-animate-effect="fadeIn">
                    <span class="icon"> <img src="/img/column2.png"> <!-- <i class="fa fa-plus" aria-hidden="true"></i> --> </span>
                    <h3>Level 2</h3>
                    <p>
                        Negotiate &amp; Manage Procurement
                    </p>
                    <ul style="text-align: left;">
                        <li>
                            Procurement
                        </li>
                        <li>
                            Payment
                        </li>
                        <li>
                            Order Monitoring
                        </li>
                        <li>
                            Supply Chain Management
                        </li>
                        <li>
                            Purchase with confidence
                        </li>
                    </ul>
                    <div class="price">
                        $300
                    </div>
                    <p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#contactUs">Contact Us</a>
                        <!-- <a href="#" class="btn btn-primary" onClick="RedmineHelpdeskWidget.toggle()">Contact Us</a> -->
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="feature-center animate-box fadeIn animated-fast fpCard" data-animate-effect="fadeIn">
                    <span class="icon"> <img src="/img/column3.png"> <!-- <i class="fa fa-plus" aria-hidden="true"></i> --> </span>
                    <h3>Level 3</h3>
                    <p>
                        From idea to market and beyond.
                    </p>
                    <ul style="text-align: left;">
                        <li>
                            Everything from Step 1 &amp; Step 2
                        </li>
                        <li>
                            Plus....
                        </li>

                    </ul>
                    <div class="price">
                        $400
                    </div>
                    <p><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#contactUs">Contact Us</a></p>
                    <!-- <a href="#" class="btn btn-primary" onClick="RedmineHelpdeskWidget.toggle()">Contact Us</a> -->
                </div>
            </div>

        </div>
    </div>
</div>



@endsection