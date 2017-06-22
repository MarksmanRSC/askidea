@extends('layouts.main')

@section('content')

<style>
    .feature-center p, .feature-center ul {
        font-size: 1.25em;
    }
</style>

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

<div class="container"></div>
<div class="container-fluid" style="clear: both; margin-top: 4em;">

</div>
<div>
    <div class="container">
    
    
        
    <div class="text-center" style="font-size: 2.0em; font-weight: lighter; padding: 1em; border: 1px solid #fff; margin-top: .5em; color: #fff;">
        <h1 style="margin-top: 0">SCALE your business.</h1>
        <p>
            You're laid the groundwork. Your business is humming. Now, it's time
            to take it to the next level. <strong>Ask Idea</strong> is the 
            valued partner that helps you scale up and increase your profit. 
            Our product sourcing and logistics services ensure that you can 
            deliver quality product while creating undeniable efficiencies 
            that directly impact your growth.
        </p>

    </div>
        
        
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="feature-center animate-box fadeIn animated-fast fpCard" data-animate-effect="fadeIn">
                    <span class="icon"> <img src="/img/column1.png"> <!-- <i class="fa fa-plus" aria-hidden="true"></i> --> </span>
                    <h3>Level 1</h3>
                    <p>
                        Private Label &amp; Sourcing Research<br><br>
                    </p>
                    <ul style="text-align: left;">
                        <li>
                            We find the optimal supply solution for your products. 
                        </li>
                        <li>
                            Rsearch potential suppliers in China based on your needs.
                        </li>
                        <li>
                            Sample Consolidation &amp; Testing (Optional)
                        </li>
                        <!-- <li>
                            Industry Regulations (Optional)
                        </li>
                        <li>
                            Supplier Qualification (Optional)
                        </li> -->
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
                        Negotiate &amp; Manage Procurement<br><br>
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
                        A suite of solutions, with end-to-end support.
                    </p>
                    <ul style="text-align: left;">
                        <li>
                            Our experienced staff will assist you in all your sourcing needs from start to finish
                        </li>

                    </ul>
                    <div class="price">
                        $450
                    </div>
                    <p><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#contactUs">Contact Us</a></p>
                    <!-- <a href="#" class="btn btn-primary" onClick="RedmineHelpdeskWidget.toggle()">Contact Us</a> -->
                </div>
            </div>

        </div>
    </div>
</div>



@endsection