<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- 
        Awesome Template
        http://www.templatemo.com/preview/templatemo_450_awesome
        -->
    <title>{{ env('APP_NAME') }}</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/frontend') }}/css/animate.min.css">
    <link rel="stylesheet" href="{{ url('assets/frontend') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('assets/frontend') }}/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ url('assets/frontend') }}/css/templatemo-style.css">
    <script src="{{ url('assets/frontend') }}/js/jquery.js"></script>
    <script src="{{ url('assets/frontend') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('assets/frontend') }}/js/jquery.singlePageNav.min.js"></script>
    <script src="{{ url('assets/frontend') }}/js/typed.js"></script>
    <script src="{{ url('assets/frontend') }}/js/wow.min.js"></script>
    <script src="{{ url('assets/frontend') }}/js/custom.js"></script>
</head>

<body id="top">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <p><i class="fa fa-phone"></i><span> Phone</span>+234 801 234 5678</p>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <p><i class="fa fa-envelope-o"></i><span> Email</span><a href="mailto:hello@cmpgen.com">hello@cmpgen.com</a></p>
                </div>
                <div class="col-md-5 col-sm-4 col-xs-12">
                    <ul class="social-icon">
                        <li><span>Meet us on</span></li>
                        <li><a href="#" class="fa fa-facebook"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-instagram"></a></li>
                        <li><a href="#" class="fa fa-youtube"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-default templatemo-nav" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button>
                <a href="{{ url('/') }}" class="navbar-brand">{{ env('APP_NAME') }}</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#top">HOME</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#calculatorModal">CALCULATOR</a></li>
                    <!-- <li><a href="#about">ABOUT</a></li>
                        <li><a href="#team">TEAM</a></li>
                        <li><a href="#service">SERVICE</a></li>
                        <li><a href="#portfolio">PORTFOLIO</a></li> -->
                    <li><a href="#contact">CONTACT</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li><i class="fa-li fa fa-times"></i> {!! $error !!}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(\Session::has('error'))
    <div class="alert alert-danger">
        <ul>
            {!! \Session::get('error') !!}
        </ul>
    </div>
    @endif
    @if(\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            {!! \Session::get('success') !!}
        </ul>
    </div>
    @endif


    @yield('main_content')

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">CMP <span>GENERATOR</span></h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-offset="50" data-wow-delay="0.9s">
                    <form action="#" method="post">
                        <label>NAME</label>
                        <input name="fullname" type="text" class="form-control" id="fullname">

                        <label>EMAIL</label>
                        <input name="email" type="email" class="form-control" id="email">

                        <label>MESSAGE</label>
                        <textarea name="message" rows="4" class="form-control" id="message"></textarea>

                        <input type="submit" class="form-control">
                    </form>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInRight" data-wow-offset="50" data-wow-delay="0.6s">
                    <address>
                        <p class="address-title">OUR ADDRESS</p>
                        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elitquisque tempus ac eget diam et laoreet phasellus ut nisi id leo molestie.</span>
                        <p><i class="fa fa-phone"></i> +234 801 234 5678</p>
                        <p><i class="fa fa-envelope-o"></i> hello@cmpgen.com</p>
                        <p><i class="fa fa-map-marker"></i> 1, Something Street, Lagos - 23401.</p>
                    </address>
                    <ul class="social-icon">
                        <li>
                            <h4>WE ARE SOCIAL</h4>
                        </li>
                        <li><a href="#" class="fa fa-facebook"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-youtube"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact -->

    <!-- start copyright -->
    <footer id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">
                        Awesome &copy; Copyright 2016</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- end copyright -->

    @yield('footer_js')
</body>

</html>