<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>@yield("title")</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Hind:400,300,500,600%7cMontserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="{{asset('hotel/css/lib/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('hotel/css/lib/font-hilltericon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('hotel/css/lib/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('hotel/css/lib/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('hotel/css/lib/jquery-ui.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('hotel/css/lib/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('hotel/css/lib/settings.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('hotel/css/lib/bootstrap-select.min.css')}}">

    <!-- MAIN STYLE -->
    <link rel="stylesheet" type="text/css" href="{{asset('hotel/css/style.css')}}">
    
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    @yield("css")
</head>

<!--[if IE 7]> <body class="ie7 lt-ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 8]> <body class="ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 9]> <body class="ie9 lt-ie10"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <body> <!--<![endif]-->
    
    <!-- PRELOADER -->
    <div id="preloader">
        <span class="preloader-dot"></span>
    </div>
    <!-- END / PRELOADER -->

    <!-- PAGE WRAP -->
    <div id="page-wrap">

        <!-- HEADER -->
        <header id="header">
            
            <!-- HEADER TOP -->
            <div class="header_top">
                <div class="container">
                    <div class="header_left float-left">
                        <span><i class="hillter-icon-cloud"></i> 18 °C</span>
                        <span><i class="hillter-icon-location"></i> 225 Beach Street, Australian</span>
                        <span><i class="hillter-icon-phone"></i> 1-548-854-8898</span>
                    </div>
                    <div class="header_right float-right">

                        <span class="login-register">															
                            <a href="{{ route('login') }}">Login</a>
                            <a href="{{ route('register') }}">register</a>
                        </span>

                        <div class="dropdown currency">
                            <span>USD <i class="fa fa"></i></span>
                            <ul>
                                <li class="active"><a href="#">USD</a></li>
                                <li><a href="#">EUR</a></li>
                            </ul>
                        </div>

                        <div class="dropdown language">
                            <span>ENG</span>

                            <ul>
                                <li class="active"><a href="#">ENG</a></li>
                                <li><a href="#">FR</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END / HEADER TOP -->
            
            <!-- HEADER LOGO & MENU -->
            <div class="header_content" id="header_content">

                <div class="container">
                    <!-- HEADER LOGO -->
                    <div class="header_logo">
                        <a href="{{ route('home') }}"><img src="{{asset('hotel/images/logo-header.png')}}" alt=""></a>
                    </div>
                    <!-- END / HEADER LOGO -->
                    
                    <!-- HEADER MENU -->
                    <nav class="header_menu">
                        <ul class="menu">
                            
                            <li><a href="{{ route('home') }}">Home</a></li>
                               
                            <li><a href="{{ route('home.about') }}">About</a></li>
                            
                            <li><a href="{{ route('home.room') }}">Rooms</a></li>

                            <li><a href="{{ route('home.restaurant') }}">Restaurant</a></li>
                            
                            <li><a href="{{ route('home.roomCheck') }}">Reservation</a></li>

                            <li><a href="{{ route('home.event') }}">Events</a></li>

                            <li><a href="{{ route('home.gallery') }}">Gallery</a></li>
                            
                            <li><a href="{{ route('home.contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                    <!-- END / HEADER MENU -->

                    <!-- MENU BAR -->
                    <span class="menu-bars">
                        <span></span>
                    </span>
                    <!-- END / MENU BAR -->

                </div>
            </div>
            <!-- END / HEADER LOGO & MENU -->

        </header>
        <!-- END / HEADER -->

        <!-- BANNER SLIDER -->
        @yield("slider")
        <!-- END / BANNER SLIDER -->
       
        <!-- BANNER CONTENT -->
        @include("_msg")
        @yield("content")
        <!-- END CONTENT -->

        <!-- FOOTER -->
        <footer id="footer">

            <!-- FOOTER TOP -->
            <div class="footer_top">
                <div class="container">
                    <div class="row">

                        <!-- WIDGET MAILCHIMP -->
                        <div class="col-lg-8">
                            <div class="mailchimp">
                                <h4>News &amp; Offers</h4>
                                <div class="mailchimp-form">
                                    <form action="#" method="POST">
                                        <input type="text" name="email" placeholder="Your email address" class="input-text">
                                        <a class="awe-btn" href="{{ route('register') }}">SIGN UP</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- END / WIDGET MAILCHIMP -->
                        
                        <!-- WIDGET SOCIAL -->
                        <div class="col-lg-3 col-lg-offset-1">
                            <div class="social">
                                <div class="social-content">
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- END / WIDGET SOCIAL -->

                    </div>
                </div>
            </div>
            <!-- END / FOOTER TOP -->

            <!-- FOOTER CENTER -->
            <div class="footer_center">
                <div class="container">
                    <div class="row">

                        <div class="col-xs-12 col-lg-5">
                            <div class="widget widget_logo">
                                <div class="widget-logo">
                                    <div class="img">
                                        <a href="{{route('home')}}"><img src="{{asset('hotel/images/logo-footer.png')}}" alt=""></a>
                                    </div>
                                    <div class="text">
                                        <p><i class="hillter-icon-location"></i> 225 Beach Street, Australian</p>
                                        <p><i class="hillter-icon-phone"></i> 1-548-854-8898</p>
                                        <p><i class="fa fa-envelope-o"></i> <a href="mailto:hillterhotel@gmail.com">hillterhotel@gmail.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-4 col-lg-2">
                            <div class="widget">
                                <h4 class="widget-title">Page site</h4>
                                <ul>
                                    <li><a href="{{route('home.room')}}">Room</a></li>
                                    <li><a href="{{route('home.gallery')}}">Gallery</a></li>
                                    <li><a href="{{route('home.restaurant')}}">Restaurant</a></li>
                                    <li><a href="{{route('home.event')}}">Event</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xs-4 col-lg-2">
                            <div class="widget">
                                <h4 class="widget-title">ABOUT</h4>
                                <ul>
                                    <li><a href="{{route('home.about')}}">About</a></li>
                                    <li><a href="{{route('home.contact')}}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xs-4 col-lg-3">
                            <div class="widget widget_tripadvisor">
                                <h4 class="widget-title">Tripadvisor</h4>
                                <div class="tripadvisor">
                                    <p>Now with hotel reviews by</p>
                                    <img src="{{asset('hotel/images/tripadvisor.png')}}" alt="">
                                    <span class="tripadvisor-circle">
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i class="part"></i>
                                    </span>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- END / FOOTER CENTER -->

            <!-- FOOTER BOTTOM -->
            <div class="footer_bottom">
                <div class="container">
                    <p>&copy; 2015 Hillter Hotel All rights reserved.</p>
                </div>
            </div>
            <!-- END / FOOTER BOTTOM -->

        </footer>
        <!-- END / FOOTER -->

    </div>
    <!-- END / PAGE WRAP -->


    <!-- LOAD JQUERY -->
    <script type="text/javascript" src="{{asset('hotel/js/lib/jquery-1.11.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('hotel/js/lib/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('hotel/js/lib/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('hotel/js/lib/bootstrap-select.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;signed_in=true"></script>
    <script type="text/javascript" src="{{asset('hotel/js/lib/isotope.pkgd.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('hotel/js/lib/jquery.themepunch.revolution.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('hotel/js/lib/jquery.themepunch.tools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('hotel/js/lib/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('hotel/js/lib/jquery.appear.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('hotel/js/lib/jquery.countTo.js')}}"></script>
    <script type="text/javascript" src="{{asset('hotel/js/lib/jquery.countdown.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('hotel/js/lib/jquery.parallax-1.1.3.js')}}"></script>
    <script type="text/javascript" src="{{asset('hotel/js/lib/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('hotel/js/lib/SmoothScroll.js')}}"></script>
    <!-- validate -->
    <script type="text/javascript" src="{{asset('hotel/js/lib/jquery.form.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('hotel/js/lib/jquery.validate.min.js')}}"></script>
    <!-- Custom jQuery -->
    <script type="text/javascript" src="{{asset('hotel/js/scripts.js')}}"></script>
    @yield("js")
</body>
</html>