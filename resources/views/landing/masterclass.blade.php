@php
    $data=\App\Http\Controllers\settings::returnselectedSettings();
//{{$data->landingHeader}}
    @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"/>



    <title>URL Shortner</title>
    <link rel="icon" href="https://image.freepik.com/free-vector/logo-barbershop-hair-salon-beauty-spa-business-with-vintage-royal-luxury-style-premium_117739-1300.jpg" type="image/icon type">
    <!-- Bootstrap core CSS -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Custom fonts for this template -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">


    <!-- <link
            href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic"
            rel="stylesheet"
            type="text/css"
    /> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="public/css/landing-page.min.css" rel="stylesheet"/>
    <link href="public/css/indexCustom.css" rel="stylesheet"/>
    <style>
        ::-webkit-scrollbar {
            width: 5px;
            direction: ltr;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>

</head>

<body>

<!-- Navigation -->
<nav id="navbar"
        class="navbar   navbar-expand-md justify-content-md-center justify-content-start fixed-top pt-3 pb-3"
>
    <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#collapsingNavbar2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>

    <a class="nav-link" href="#_"></a>
    <div
            class="navbar-collapse collapse justify-content-between align-items-center w-100"
            id="collapsingNavbar2">
    <div class="mx-md-auto d-lg-flex flex-direction-md-row">
        <ul class="navbar-nav " >
            <li class="nav-item">
                <a class="nav-link na" style="color: {{$data->landinHeaderText}}"  href="#">Solution</a>
            </li>
            <li class="nav-item">
                <a class="nav-link na" style="color: {{$data->landinHeaderText}}" href="#">Featuring</a>
            </li>
            <li class="nav-item my-auto">
                <a class="nav-link navbar-brand mx-0 d-none d-md-inline na" style="color: {{$data->landinHeaderText}}" href=""
                >BITLY</a
                >
            </li>
            <li class="nav-item">
                <a class="nav-link na" style="color: {{$data->landinHeaderText}}" href="#">Pricing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link na" style="color: {{$data->landinHeaderText}}" href="#">Resources</a>
            </li>
        </ul>

    </div>
            <ul class="navbar-nav">
                @if(!session()->exists('people'))
            <li class="nav-item">
                            <a href="{{url('login')}}" style="font-family: 'Quicksand';border-radius: 10px;transition: all .5s ease;"  class="btn btn-lg btn-{{$data->landingHeaderLogin}} text-{{$data->ltc}}  pl-3 pr-3 pt-2 pb-2">login</a>
                        </li>
                @else
                <li class="nav-item">
                            <a href="{{url('user/links')}}" style="font-family: 'Quicksand';border-radius: 10px;transition: all .5s ease;"  class="btn btn-lg btn-{{$data->landingHeaderLogin}} text-{{$data->ltc}}  pl-3 pr-3 pt-2 pb-2">Dashboard</a>
                        </li>
                    @endif
                    </ul>
    </div>
</nav>

<!-- Masthead -->




<header class="masthead text-white text-center " style=" background: url({{$data->landingBg}}) no-repeat center center;background-size: cover;position: relative;background-color: #343a40;padding-top: 8rem;padding-bottom: 8rem;">

<div class="overlay"></div>

    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h3>
                    A <span style="color:#bd2130; font-family: Poppins,sans-serif; font-weight: 800 ;font-size:40px">URL shortener</span> built with powerful tools to help you grow and
                    protect your brand.
                </h3>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 mt-5 mx-auto">

                    <input
                            type="text"
                            id="hostUrl"
                            class="form-control"
                            placeholder="Enter URL to Host"
                            style="padding: 2rem"
                    />

                     <div class="input-group mb-3 mt-3" id="virtualDiv">
{{--                    <div class="input-group-prepend">--}}
{{--                        <span class="input-group-text" id="basic-addon3"><b>url.com/</b></span>--}}
{{--                    </div>--}}
                         <input
                             type="text"
                             class="form-control"
                                id="virtualLink"

                             style="padding: 2rem"
                             readonly
                         />
                         <div class="input-group-append">
                             <button onclick="copyVirtualCode(0,$('#virtualLink'))"  class="btn-outline-success input-group-text " data-toggle="tooltip" data-placement="top" title="Copy "><i class="fas fa-copy"></i></button>
                         </div>
                    <div class="input-group-append">
                    <button onclick="sendUrlToLogin()" class="btn-outline-dark input-group-text pl-5 pr-5">Edit</button>
                    </div>
                </div>

                    <button class="btn btn-lg btn-dark btn-block mt-3" onclick="shorten('{{csrf_token()}}')" id="shortenMyLinkBtn" type="submit">
                        Shorten my link
                    </button>
                    <p class="mt-3 text-light">OR</p>

                <div class="col-md-12 col-lg-12 col-xl-12">
                    <button
                        onclick="window.location.href='user/hosting'"
                            type="submit"
                            class="btn btn-info mb-0"
                            style="width: 20rem; height: 5rem">
                        Host free static website
                    </button>
                </div>
            </div>
        </div>

    </div>
</header>


<section class="features-icons bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon-screen-desktop m-auto text-primary"></i>
                    </div>
                    <h3>Fully Responsive</h3>
                    <p class="lead mb-0">
                        This theme will look great on any device, no matter the size!
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon-layers m-auto text-primary"></i>
                    </div>
                    <h3>Bootstrap 4 Ready</h3>
                    <p class="lead mb-0">
                        Featuring the latest build of the new Bootstrap 4 framework!
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon-check m-auto text-primary"></i>
                    </div>
                    <h3>Easy to Use</h3>
                    <p class="lead mb-0">
                        Ready to use with your own content, or customize the source
                        files!
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Image Showcases -->
<section class="showcase">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div
                    class="col-lg-6 order-lg-2 text-white showcase-img"
                    style="background-image: url('public/images/14.jpg')"
            ></div>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h2>Fully Responsive Design</h2>
                <p class="lead mb-0">
                    When you use a theme created by Start Bootstrap, you know that the
                    theme will look great on any device, whether it's a phone, tablet,
                    or desktop the page will behave responsively!
                </p>
            </div>
        </div>
        <div class="row no-gutters">
            <div
                    class="col-lg-6 text-white showcase-img"
                    style="background-image: url('public/images/12.jpg')"
            ></div>
            <div class="col-lg-6 my-auto showcase-text">
                <h2>Updated For Bootstrap 4</h2>
                <p class="lead mb-0">
                    Newly improved, and full of great utility classes, Bootstrap 4 is
                    leading the way in mobile responsive web development! All of the
                    themes on Start Bootstrap are now using Bootstrap 4!
                </p>
            </div>
        </div>
        <div class="row no-gutters">
            <div
                    class="col-lg-6 order-lg-2 text-white showcase-img"
                    style="background-image: url('public/images/13.jpg')"
            ></div>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h2>Easy to Use &amp; Customize</h2>
                <p class="lead mb-0">
                    Landing Page is just HTML and CSS with a splash of SCSS for users
                    who demand some deeper customization options. Out of the box, just
                    add your content and images, and your new landing page will be
                    ready to go!
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials text-center bg-light">
    <div class="container">
        <h2 class="mb-5">What people are saying...</h2>
        <div class="row">
            <div class="col-lg-4">
                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                    <img
                            class="img-fluid rounded-circle mb-3"
                            src="img/testimonials-1.jpg"
                            alt=""
                    />
                    <h5>Margaret E.</h5>
                    <p class="font-weight-light mb-0">
                        "This is fantastic! Thanks so much guys!"
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                    <img
                            class="img-fluid rounded-circle mb-3"
                            src="img/testimonials-2.jpg"
                            alt=""
                    />
                    <h5>Fred S.</h5>
                    <p class="font-weight-light mb-0">
                        "Bootstrap is amazing. I've been using it to create lots of
                        super nice landing pages."
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                    <img
                            class="img-fluid rounded-circle mb-3"
                            src="img/testimonials-3.jpg"
                            alt=""
                    />
                    <h5>Sarah W.</h5>
                    <p class="font-weight-light mb-0">
                        "Thanks so much for making these free resources available to
                        us!"
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h2 class="mb-4">Ready to get started? Sign up now! <i class="fa fa-heart text-danger"></i></h2>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <form>
                    <div class="form-row">
                        <div class="col-12 col-md-9 mb-2 mb-md-0">
                            <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Enter URL to Host"
                                    required=""
                                    style="padding: 1.5rem"
                            />
                        </div>
                        <div class="col-12 col-md-3">
                            <button
                                    type="submit"
                                    class="btn btn-block btn-lg btn-primary"
                            >
                                Sign up!
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<!-- Site footer -->
<footer class="footer-section">
    <div class="container">
        <div class="footer-cta pt-5 pb-5">
            <div class="row">
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="cta-text">
                            <h4>Find us</h4>
                            <span>1010 Avenue, sw 54321, chandigarh</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <i class="fas fa-phone"></i>
                        <div class="cta-text">
                            <h4>Call us</h4>
                            <span>9876543210 0</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <i class="far fa-envelope-open"></i>
                        <div class="cta-text">
                            <h4>Mail us</h4>
                            <span>mail@info.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-content pt-5 pb-5">
            <div class="row">
                <div class="col-xl-4 col-lg-4 mb-50">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="index.html"
                            ><img
{{--                                    src="https://i.ibb.co/QDy827D/ak-logo.png"--}}
{{--                                    class="img-fluid"--}}
{{--                                    alt="logo"--}}
                            /></a>
                        </div>
                        <div class="footer-text">
                            <p>
                                Lorem ipsum dolor sit amet, consec tetur adipisicing elit,
                                sed do eiusmod tempor incididuntut consec tetur adipisicing
                                elit,Lorem ipsum dolor sit amet.
                            </p>
                        </div>
                        <div class="footer-social-icon">
                            <span>Follow us</span>
                            <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                            <a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
                            <a href="#"><i class="fab fa-google-plus-g google-bg"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>Useful Links</h3>
                        </div>
                        <ul class="text-white">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">about</a></li>
                            <li><a href="#">services</a></li>
                            <li><a href="#">portfolio</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Expert Team</a></li>
                            <li><a href="{{url('contact')}}">Contact us</a></li>
                            <li><a href="#">Latest News</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>Subscribe</h3>
                        </div>
                        <div class="footer-text mb-25">
                            <p>
                                Don’t miss to subscribe to our new feeds, kindly fill the
                                form below.
                            </p>
                        </div>
                        <div class="subscribe-form">
                            <form action="#">
                                <input type="text" placeholder="Email Address"/>
                                <button><i class="fab fa-telegram-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                    <div class="copyright-text">
{{--                        <p>--}}
{{--                            Copyright &copy; 2018, All Right Reserved--}}
{{--                            <a href="https://codepen.io/anupkumar92/">17-NTU-119</a>--}}
{{--                        </p>--}}
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                    <div class="footer-menu">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Terms</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Policy</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="public/js/jquery.min.js"></script>
<script src="public/js/bootstrap.bundle.min.js"></script>
<script src="public/js/custom.js"></script>
<script>

        $(document).ready(function(){
        var scroll_start = 0;
        var startchange = $('.navbar');
        var offset = startchange.offset();
            if (startchange.length){
        $(document).scroll(function() {
            scroll_start = $(this).scrollTop();
            if(scroll_start > offset.top) {
                $(".na").css('color', 'black');
            } else {
                $('.na').css('color', '{{$data->landinHeaderText}}');
            }
        });
    }

});
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-70px";
  }
  prevScrollpos = currentScrollPos;
}
    </script>
</body>
</html>
