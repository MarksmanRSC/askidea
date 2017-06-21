<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ask Idea USA - Your Private Label Partner</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css">

        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

        <link rel="stylesheet" href="/css/assets.css">
    </head>

    <style>
        .mobile, .desktop {
            position: relative;
            top: 50px;
            /*border-bottom: solid 1px #ffffff;*/
        }

        .mobile {
            display: none;
        }

        @media screen and (max-width: 776px) {
            .mobile {
                display: block;
            }

            .desktop {
                display: none;
            }
        }

        .logo {
            width: 180px;
            margin: 10px;
        }

    </style>

    <body>

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img class="logo" class="img-responsive" src="./assets/img/logo.png"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <!-- <li>
                            <a href="/about-us">About Us</a>
                        </li> -->
                        <!-- <li><a href="./services.php">Services</a></li> -->
                        <!-- <li><a href="#" data-toggle="modal" data-target="#contactUs">Contact Us</a></li> -->
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
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

            @yield("content")

            <footer>
                <div class="container-fluid">
                    <div class="col-md-3">
                        <img src="/assets/img/logo.png" class="img-responsive" />
                        <p>
                            One stop for all your private label manufacturing needs.
                        </p>
                    </div>

                    <div class="col-md-3">

                    </div>

                    <div class="col-md-3">

                    </div>

                </div>
            </footer>

            <div id="contactUs" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                &times;
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-area">

                    

                                <form accept-charset="UTF-8" method="post" id="widget_form2" style="margin-bottom: 0px;">
                                    <div id="title" class="title">
                                        <h1 style="color: #121212">Contact Ask Idea</h1>
                                        <p style="color: #121212">
                                            Let us know how we can help.
                                        </p>
                                    </div><div id="flash" class="flash"></div>
                                    <input id="username" name="username" placeholder="Your name" class="form-control required-field" type="text">
                                    <input id="email" name="email" placeholder="Email address" class="form-control required-field" type="text">
                                    <input id="subject" name="issue[subject]" placeholder="Subject" class="form-control required-field" type="text">
                                    <select id="project_id" name="project_id" class="form-control projects" onchange="needReloadProjectData();">
                                        <option value="30">Talk to a sales rep</option><option value="31">Customer support</option><option value="31">Other</option>
                                    </select>
                                    <textarea cols="55" rows="10" id="description" name="issue[description]" placeholder="Let us know how we can help..." class="form-control required-field"></textarea>
                                    <div id="container" class="container">
                                        <div id="custom_fields" class="custom_fields">
                                            <input id="tracker_id" name="tracker_id" class="form-control trackers" value="6" onchange="needReloadProjectData();" type="hidden">
                                            <div></div>
                                        </div>
                                        <!-- <div id="submit_button" class="submit_button"> -->
                                        <!-- <input name="submit" class="btn" value="Send" title="" type="submit"> -->
 
                                        <!-- </div> -->
                                    </div>
                                                                           <center>
                                            
                                        <button class="btn btn-primary">
                                            Send
                                        </button>
                                        </center>
                                </form>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

            <script>
                $(document).ready(function() {

                    $(".attach_field").change(function() {
                        RedmineHelpdeskWidget.upload_file()
                    });

                    $("#widget_form2").submit(function(e) {

                        var formData = $(this).serializeArray();

                        console.log(formData);

                        e.preventDefault();

                        $.ajax({
                           type: "POST",
                           url: "https://redmine.marksmanrsc.com/helpdesk_widget/create_ticket",
                           data: formData,
                           crossOrigin: false,
                           success: function(response) {
                                console.log(response);

                                if (response.result == true) {
                                    $("#widget_form2").html("<h4 style='color: #121212'>Thanks for contacting us!</h4><h5 style='color: #121212'>You should receive an email shortly!</h5>");
                                } else {
                                    alert("Please fill out the form completely.");
                                }
                            }
                        });
                           
                           
                            
                        // });
// 
                        // $.post("https://redmine.marksmanrsc.com/helpdesk_widget/create_ticket", formData).done(function(response) {
                            // console.log(response);
// 
                            // if (response.result == true) {
                                // $("#widget_form2").html("<h4 style='color: #121212'>Thanks for contacting us!</h4><h5 style='color: #121212'>You should receive an email shortly!</h5>");
                            // } else {
                                // alert("Please fill out the form completely.");
                            // }
                        // });

                        return false;

                    });
                });
            </script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="/js/jquery.ajax-cross-origin.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

            <span> <div id="helpdesk_widget"></div> <script type="text/javascript" src="/js/ticket.js"></script> </span>
    </body>

</html>