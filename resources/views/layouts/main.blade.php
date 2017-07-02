<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ask Idea Sourcing - Your Private Label Partner</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
          rel="stylesheet">

    <link rel="stylesheet" href="/css/assets.css">

    @yield('css')
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img class="logo" class="img-responsive"
                                                  src="/img/SmallLogoBW_wide.png" style="height: 40px; margin-top: 5px;"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route('home.index') }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('about_us.index') }}">About Us</a>
                </li>
                <li><a href="{{ route('services.index') }}">Services</a></li>
                <!-- <li><a href="#" data-toggle="modal" data-target="#contactUs">Contact Us</a></li> -->
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

@yield("content")

<footer>

    <div class="container" style="padding-top: 3em; padding-bottom: 1em">
        <div class="col-md-4">
            <ul>
                <li><i class="fa fa-phone"></i> <a href="tel:1-513-285-8899">+1-513-285-8899</a></li>
                <li>
                    <i class="fa fa-map-marker"></i> 9900 Carver Rd, Suite 200,Cincinnati, OH 45242
                </li>
            </ul>
        </div>

        <div class="col-md-4">
            <ul>
                <li><a href="/assets/Privacy_Policy.pdf">Privacy Policy</a></li>
                <li>
                    Monday-Friday 9:00AM-5:00PM EST
                </li>
            </ul>
        </div>

        <div class="col-md-4">
            <i class="fa fa-facebook-square fa-3x" style="color: #333;"></i>

            <i class="fa fa-linkedin-square fa-3x" style="margin-left: 8px; color: #333;"></i>
        </div>

    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/js/jquery.ajax-cross-origin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {

        $(".attach_field").change(function () {
            RedmineHelpdeskWidget.upload_file()
        });

        $("#widget_form2").submit(function (e) {

            var formData = $(this).serializeArray();

            console.log(formData);

            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "https://redmine.marksmanrsc.com/helpdesk_widget/create_ticket",
                data: formData,
                crossOrigin: false,
                success: function (response) {
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

@yield('js')

<span><div id="helpdesk_widget"></div> <script type="text/javascript" src="/js/ticket.js"></script></span>
</body>

</html>