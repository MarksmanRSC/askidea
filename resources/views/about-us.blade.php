@extends('layouts.main');

@section('content')

<style>
    #about {
        background-image: url("/img/services.jpg");
        min-height: 40em;
        background-size: cover;
    }

    #aboutHead {
        margin-top: 5em;
        background-color: rgba(0,0,0,.0);
    }

    .profile {
        text-align: center;
    }

    .profilePic {
        background-repeat: no-repeat;
        background-size: scale;
        background-image: url('./assets/img/profilePic.png');
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
        background-color: rgba(0,0,0,0.5);
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

    #aboutHead {
        color: #fff;
    }

</style>

<div class="container-fluid" id="about">

    <div class="container">
        <div id="aboutHead" class="jumbotron jumbotron-fluid">

            <h1 class="display-3">Your <u>China</u> Connection</h1>
            <p class="lead text-center">
                <u>Ask Idea is your private label manufacturing partner.</u>
            </p>
        </div>
    </div>
</div>

<div class="container">
    <!-- <p>
        With all the current platform, it is easy for Amazon sellers to
        find a supplier in China. But you will be frustrated to find the
        right suppliers among them who offer a fair price with decent
        product quality. Ask Idea Sourcing offer sourcing service and
        consulting services for Amazon seller with which you can source
        easily and comfortably from China. We have over 10-year
        experience in sourcing and international supply chain.
    </p>
    <p>
        Ask Idea Sourcing have an office located both in China and
        America. Having our expertise located in China, we are closer
        to the supplier and we can provide you with the latest
        information in the Chinese market. At the same time, our U.S.
        team knows your demand and strive our best to keep the process
        as transparent as it can.
    </p> -->

    <p class="text-center" style="font-size: 2.0em; font-weight: lighter; padding: 1em; border: 1px solid #fff; margin-top: .5em;">
        Finding cost-effective and reliable product sources plays right into your
        bottom line. But you don't feel equipped to work with suppliers from
        China on your own. <strong>Ask Idea</strong> serves as an extension of
        your team, removing your concerns and obstacles of sourcing overseas
        by being on-the-ground in China when you can't be.
    </p>

    <h1>Leadership Team</h1>

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
                    <h5 class="title">Sales Consultant</h5>
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
            <div class="profilePic" style="background-image: url('/img/team/Lauren.jpg');">
                <div style="text-align: center; background: rgba(0,55,99, 0.5);">
                    <h4 class="name">Lauren Wenner</h4>
                    <h5 class="title">Marketing Assistant</h5>
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
            <div class="profilePic" style="background-image: url('/img/team/Robert.jpg');">
                <div style="text-align: center; background: rgba(0,55,99, 0.5);">
                    <h4 class="name">Robert Tucker</h4>
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
            <div class="profilePic" style="background-image: url('/img/team/Kelly.jpg');">
                <div style="text-align: center; background: rgba(0,55,99, 0.5);">
                    <h4 class="name">Kelly Xu</h4>
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
    
    <div class="clearfix"></div>
    <div style="min-height: 10em;"><br></div>
        

    <!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="profile">
    <div class="profilePic" ></div>
    <div style="text-align: center;">
    <h4>Name</h4>
    <h5>Title</h5>
    </div>
    <p>Descritpion</p>
    </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="profile">
    <div class="profilePic"></div>
    <div style="text-align: center;">
    <h4>Name</h4>
    <h5>Title</h5>
    </div>
    <p>Descritpion</p>
    </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="profile">
    <div class="profilePic" ></div>
    <div style="text-align: center;">
    <h4>Name</h4>
    <h5>Title</h5>
    </div>
    <p>Descritpion</p>
    </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="profile">
    <div class="profilePic" ></div>
    <div style="text-align: center;">
    <h4>Name</h4>]
    <h5>Title</h5>
    </div>
    <p>Descritpion</p>
    </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="profile">
    <div class="profilePic" ></div>
    <div style="text-align: center;">
    <h4>Name</h4>
    <h5>Title</h5>
    </div>
    <p>Descritpion</p>
    </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="profile">
    <div class="profilePic" ></div>
    <div style="text-align: center;">
    <h4>Name</h4>
    <h5>Title</h5>
    </div>
    <p>Descritpion</p>
    </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="profile">
    <div class="profilePic" ></div>
    <div style="text-align: center;">
    <h4>Name</h4>
    <h5>Title</h5>
    </div>
    <p>Descritpion</p>
    </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="profile">
    <div class="profilePic" ></div>
    <div style="text-align: center;">
    <h4>Name</h4>
    <h5>Title</h5>
    </div>
    <p>Descritpion</p>
    </div>
    </div> -->

</div>

<!-- <div class="container">

<p>
With all the current platform, it is easy for Amazon sellers to find a supplier in China. But you will be
frustrated to find the right suppliers among them who offer a fair price with decent product quality.
Ask Idea Sourcing offer sourcing service and consulting services for Amazon seller with which you can
source easily and comfortably from China. We have over 10-year experience in sourcing and international
supply chain.
</p>
<p>
Ask Idea Sourcing have an office located both in China and America. Having our expertise located in
China, we are closer to the supplier and we can provide you with the latest information in the Chinese
market. At the same time, our U.S. team knows your demand and strive our best to keep the process as
transparent as it can.
</p>

<div class="col-sm-4 card card-m">
<div class="card-content">
<h1 class="card-title">Testing</h1>
<h2 class="card-subtitle">CEO (US)</h2>
</div>

</div>
<div class="col-sm-4 card card-m">
<div class="card-content">
<h1 class="card-title">Testing</h1>
<h2 class="card-subtitle">CTO (US)</h2>
</div>

</div>
<div class="col-sm-4 card card-m">
<div class="card-content">
<h1 class="card-title">Testing</h1>
<h2 class="card-subtitle">CFO (US)</h2>
</div>

</div>
<div class="col-sm-4 card card-m">
<div class="card-content">
<h1 class="card-title">Testing</h1>
<h2 class="card-subtitle">COO (China)</h2>
</div>

</div>
<div class="col-sm-4 card card-m">
<div class="card-content">
<h1 class="card-title">Testing</h1>
<h2 class="card-subtitle">Board Member (US)</h2>
</div>

</div>
<div class="col-sm-4 card card-m">
<div class="card-content">
<h1 class="card-title">Testing</h1>
<h2 class="card-subtitle">Board Member (US)</h2>
</div>

</div>
<div class="col-sm-4 card card-m">
<div class="card-content">
<h1 class="card-title">Testing</h1>
<h2 class="card-subtitle">Project Manager (China)</h2>
</div>

</div>

<div class="col-sm-4 card card-m">
<div class="card-content">
<h1 class="card-title">Testing</h1>
<h2 class="card-subtitle">Sourcing Agent (China)</h2>
</div>

</div>

<div class="col-sm-4 card card-m">
<div class="card-content">
<h1 class="card-title">Testing</h1>
<h2 class="card-subtitle">Sourcing Agent (China)</h2>
</div>

</div>

<div class="col-sm-4 card card-m">
<div class="card-content">
<h1 class="card-title">Testing</h1>
<h2 class="card-subtitle">Sourcing Agent (China)</h2>
</div>

</div>
<div class="clearfix"></div>

</div> -->

@endsection