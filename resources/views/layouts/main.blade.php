<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield('meta')

    <title>Ask Idea Sourcing - Your Private Label Partner</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.15/css/theme.bootstrap_3.min.css" />
    <link rel="stylesheet" href="/css/assets.css?v=1.0.1">
    @yield('css')
</head>

<body>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-101476693-1', 'auto');
    ga('send', 'pageview');

</script>

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
                <li><a href="{{ route('service.index') }}">Services</a></li>
                <li><a href="{{ route('blog.index') }}">Blog</a></li>

                @if(!Auth::guest())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @if(Auth::user()->isAgent())
                                <li><a href="{{ route('pc_agent.home') }}">APC Agent System</a></li>
                            @endif
                            @if(Auth::user()->isAdmin())
                                <li><a href="{{ route('user.index') }}">User Management</a></li>
                            @endif
                            <li><a href="{{ route('promo_code.index') }}">Promo Code</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ route('register') }}">Register</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

@yield("content")

<footer>
    <div class="container" style="border-top: 1px solid #dddddd;"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-6">
                <ul>
                    <li><i class="fa fa-phone"></i> <a href="tel:1-513-285-8899">+1-513-285-8899</a></li>
                    <li>
                        <i class="fa fa-map-marker"></i> 9900 Carver Rd, Suite 200,Cincinnati, OH 45242
                    </li>
                </ul>
            </div>

            <div class="col-md-4 col-xs-6">
                <ul>
                    <li><a href="/assets/Privacy_Policy.pdf">Privacy Policy</a></li>
                    <li>
                        Monday-Friday 9:00AM-5:00PM EST
                    </li>
                </ul>
            </div>

            <div class="col-md-4 col-xs-6">
                <i class="fa fa-facebook-square fa-3x" style="color: #333;"></i>

                <i class="fa fa-linkedin-square fa-3x" style="margin-left: 8px; color: #333;"></i>
            </div>

        </div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="/js/jquery.ajax-cross-origin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.15/js/jquery.tablesorter.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.15/js/jquery.tablesorter.widgets.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.15/js/extras/jquery.tablesorter.pager.min.js"></script>

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

<span><div id="helpdesk_widget"></div> <script type="text/javascript" src="/js/ticket.js?v=1.0.1"></script></span>
</body>

</html>
