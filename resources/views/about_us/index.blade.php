@extends('layouts.main');

@section('css')
    <style>

        .profile {
            text-align: center;
        }

        .profilePic {
            background-repeat: no-repeat;
            min-height: 10em;
            display: inline-block;
            max-width: 70%;
            opacity: 0.8;
        }

        .profile:hover {
            /*box-shadow: 0 2px 40px 0 rgba(0, 0, 0, 0.6);*/
            /*-webkit-transform: translate3d(0, -10px, 0);*/
            /*transform: translate3d(0, -10px, 0);*/
            /*border-radius: 1em;*/

            /*background-color: #0288D1;*/
        }

        .profile:hover > .profilePic {
            opacity: 1.0;

            box-shadow: 0 2px 40px 0 rgba(0, 0, 0, 0.6);

        }

        /*.profile:hover > .jobDesc {
            transition: 2s ease-in-out;
            -moz-transition: 2s ease-in-out;
            display: block;
        }*/

        h4.name {
            margin-top: 10em;
            margin-bottom: 0;
        }

        h5.title {
            margin-top: 0;
            /*text-transform: uppercase;*/
        }

        h4.name, h5.title {
            background-color: rgba(0, 0, 0, 0.5);
            padding: .1em;
            opacity: 1.0;
        }

        .jobDesc {
            /*padding-top: 4em;*/

            padding: 1em;
            /*float: right;*/
            display: none;
            text-align: left;
        }

        /* lpk report "Why Us" */

        .lpk-row .lpk-card {
            min-height: 370px;
            margin-top: 24px;
            padding: 15% 10%;
            -webkit-filter: grayscale(100%);
        }

        .lpk-row ul {
            margin-top: 32px;
            padding-left: 0;
            list-style: none;
        }

        .lpk-row ul li h5 {
            font-weight: normal;
            font-size: 16px;
        }

        .lpk-row h4 {
            font-weight: bolder;
        }

        .lpk-row h4, .lpk-row h5 {
            color: white;
        }
    </style>
@endsection

@section('js')


@endsection

@section('content')

    <div class="container-fluid" id="about">
        <div class="row">
            <div id="aboutHead" class="jumbotron jumbotron-fluid">
                <h1 class="display-3">Your <u>China</u> Connection</h1>
                <p class="lead text-center">
                    <u>Ask Idea is your private label manufacturing partner.</u>
                </p>
            </div>
        </div>
    </div>

    <div class="container" style="padding-top: 32px;">

        <div class="row">
            <div class="col-12">
                <p class="text-center"
                   style="font-size: 2.0em; font-weight: lighter; padding: 1em; border: 1px solid #fff; margin-top: .5em;">
                    You've laid the groundwork. Your business is humming. Now, it's time
                    to take it to the next level. <strong>Ask Idea</strong> is the
                    valued partner that helps you scale up and increase your profit.
                    Our product sourcing and logistics services ensure that you can
                    deliver quality product while creating undeniable efficiencies
                    that directly impact your growth.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h1>Leadership Team</h1>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 animate-box fadeIn animated-fast">
                <div class="profile">
                    <div class="profilePic" style="background-image: url('/img/team/Mike2.jpg');">
                        <div style="text-align: center; background: rgba(0,55,99, 0.5);">
                            <h4 class="name">Mike Wang</h4>
                            <h5 class="title">CEO</h5>
                        </div>
                    </div>
                    <!-- <div class="jobDesc">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at est nunc.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at est nunc.
                        </p>
                    </div> -->
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 animate-box fadeIn animated-fast">
                <div class="profile">
                    <div class="profilePic" style="background-image: url('/img/team/Rich.jpg');">
                        <div style="text-align: center; background: rgba(0,55,99, 0.5);">
                            <h4 class="name">Rich Kiley</h4>
                            <h5 class="title">Chairman</h5>
                        </div>
                    </div>
                    <!-- <div class="jobDesc">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at est nunc.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at est nunc.
                        </p>
                    </div> -->
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 animate-box fadeIn animated-fast">
                <div class="profile">
                    <div class="profilePic" style="background-image: url('/img/team/Jason.jpg');">
                        <div style="text-align: center; background: rgba(0,55,99, 0.5);">
                            <h4 class="name">Jason Thistlethwaite</h4>
                            <h5 class="title">CTO</h5>
                        </div>
                    </div>
                    <!-- <div class="jobDesc">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at est nunc.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at est nunc.
                        </p>
                    </div> -->
                    <div class="clearfix"></div>
                </div>
            </div>


            <!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 animate-box fadeIn animated-fast">
                <div class="profile">
                    <div class="profilePic" style="background-image: url('/img/team/kimmy_yang.jpg');">
                        <div style="text-align: center; background: rgba(0,55,99, 0.5);">
                            <h4 class="name">Kimmy Yang</h4>
                            <h5 class="title">CTO</h5>
                        </div>
                    </div>
                    <div class="jobDesc">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at est nunc.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at est nunc.
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div> -->

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 animate-box fadeIn animated-fast">
                <div class="profile">
                    <div class="profilePic" style="background-image: url('/img/team/Jerome.jpg');">
                        <div style="text-align: center; background: rgba(0,55,99, 0.5);">
                            <h4 class="name">Jerome Raphael</h4>
                            <h5 class="title">Account Manager</h5>
                        </div>
                    </div>
                    <!-- <div class="jobDesc">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at est nunc.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at est nunc.
                        </p>
                    </div> -->
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 animate-box fadeIn animated-fast">
                <div class="profile">
                    <div class="profilePic" style="background-image: url('/img/team/Owen.jpg');">
                        <div style="text-align: center; background: rgba(0,55,99, 0.5);">
                            <h4 class="name">Owen Li</h4>
                            <h5 class="title">Project Manager</h5>
                        </div>
                    </div>
                    <!-- <div class="jobDesc">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at est nunc.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at est nunc.
                        </p>
                    </div> -->
                    <div class="clearfix"></div>
                </div>
            </div>


            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 animate-box fadeIn animated-fast">
                <div class="profile">
                    <div class="profilePic" style="background-image: url('/img/team/Kelly.jpg');">
                        <div style="text-align: center; background: rgba(0,55,99, 0.5);">
                            <h4 class="name">Kelly Xu</h4>
                            <h5 class="title">Account Manager</h5>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>

        </div>

        <div class="row lpk-row" style="margin-top: 32px;">
            <div class="col-xs-12">
                <h2>Why Us</h2>
            </div>
            <div class="col-xs-12">
                <h4 style="font-weight: bold; color: white; margin: 0; padding: 0;">Ask Idea offers full Sourcing Agent
                    services, PLUS:</h4>
            </div>
            <div class="col-xs-12" style="margin-top: 40px;">
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="col-xs-12 lpk-card" style="background: linear-gradient(rgba(0, 0, 0, 0.7),rgba(0, 0, 0, 0.7)), url({{asset('img/about_us/index/first.jpeg')}}); background-size: cover;">
                            <h4>Simpler, more reliable sourcing from China.</h4>
                            <ul>
                                <li><h5>
                                        We are an American-based company with native teams in both the US and China
                                    </h5></li>
                                <li><h5>
                                        Our sourcing team is on the ground in China, ensuring that every supplier is
                                        credible
                                    </h5></li>
                                <li><h5>
                                        We alleviate communication, cultural and quality control barriers/concerns
                                    </h5></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <div class="col-xs-12 lpk-card" style="background: linear-gradient(rgba(0, 0, 0, 0.7),rgba(0, 0, 0, 0.7)), url({{asset('img/about_us/index/second.jpeg')}}); background-size: cover;">
                            <h4>A consultative approach to sourcing.</h4>
                            <ul>
                                <li><h5>
                                        We find the optimal, complete solution for your end product or portfolio
                                    </h5></li>
                                <li><h5>
                                        We bundle across multiple suppliers for cost savings
                                    </h5></li>
                                <li><h5>
                                        We put the seller first, never based on commission with manufacturers
                                    </h5></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <div class="col-xs-12 lpk-card" style="background: linear-gradient(rgba(0, 0, 0, 0.7),rgba(0, 0, 0, 0.7)), url({{asset('img/about_us/index/third.jpg')}}); background-size: cover;">
                            <h4>An expert understanding of Amazon & overseas logistics.</h4>
                            <ul>
                                <li><h5>
                                        We understand the complexities of Amazon’s requirements and how to help sellers
                                        best succeed
                                    </h5></li>
                                <li><h5>
                                        We are well-versed in global certification and legal regulations
                                    </h5></li>
                                <li><h5>
                                        We have deep expertise with overseas transportation
                                    </h5></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection