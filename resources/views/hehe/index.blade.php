<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v5.3.0, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.3.0, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/mbr-137x199.png" type="image/x-icon">
  <meta name="description" content="">


  <title>FYP</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.theme.css">
  <link rel="stylesheet" href="assets/datepicker/jquery.datetimepicker.min.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">

   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">


</head>
<body>

  <section class="menu menu2 cid-sq80KOf6gX" once="menu" id="menu2-o">

    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="">
                        <img src="assets/images/mbr-137x199.png" alt="Mobirise" style="height: 3.2rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-7" href="">URL Shortener</a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item"><a class="nav-link link text-white display-4" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link link text-white display-4" href="">
                            Why urlcc?</a></li>
                    <li class="nav-item"><a class="nav-link link text-white display-4" href="">Hosting</a>
                    </li><li class="nav-item"><a class="nav-link link text-white display-4" href="">How to?</a></li></ul>
                <div class="icons-menu">
                    <a class="iconfont-wrapper" href="" target="_blank">
                        <span class="p-2 " style="color: rgb(68, 121, 217); fill: rgb(68, 121, 217);"><i class="fab fa-facebook-f"></i></span>
                    </a>
                    <a class="iconfont-wrapper" href="" target="_blank">
                        <span class="p-2 " style="color: rgb(34, 165, 229); fill: rgb(34, 165, 229);"><i class="fab fa-twitter"></i></span>
                    </a>
                    <a class="iconfont-wrapper" href="" target="_blank">
                        <span class="p-2" style="color: rgb(237, 50, 50); fill: rgb(237, 50, 50);"><i class="fab fa-instagram"></i></span>
                    </a>
                    <a class="iconfont-wrapper" href="" target="_blank">
                        <span class="p-2 " style="color: rgb(110, 199, 242); fill: rgb(110, 199, 242);"><i class="fab fa-linkedin"></i></span>
                    </a>
                </div>


                    <div class="navbar-buttons mbr-section-btn"><a class="btn btn-warning display-4" href="user/links">Login<br></a> <a onclick="sessionStorage.clear()" class="btn btn-warning display-4" href="register">Signup</a></div>


            </div>
        </div>
    </nav>
</section>

<section class="form1 cid-sqkppjPvF9 mbr-fullscreen mbr-parallax-background" id="form1-w">



    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(255, 255, 255);"></div>
    <div class="align-center container">
        <div class="row justify-content-center">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                <form  class="mbr-form form-with-styler" data-form-title="Form Name">
                    <div class="dragArea ">
                        <div class="col-12">
                            <h1 class="mbr-section-title mb-4 display-2"><strong>
                                URL Shortner</strong></h1>
                        </div>
                        <div class="col-12">
                            <p class="mbr-text mbr-fonts-style mb-5 display-7">World's unique URL Manager to save your url data and analyse your url stats , Also host your static website Free on our website</p>
                        </div>
                        <div class="col-md col-12 form-group" data-for="name">
                            <input type="text" name="name" placeholder="Enter url of your host" data-form-field="Name"  class="form-control" id="hostUrl">
                        </div>
			<div class="input-group mb-3 mt-3 col-md col-12" id="virtualDiv">

                         <input
                             type="text"
                             class="form-control"
                                id="virtualLink"
				readonly
                         />
                         <div class="input-group-append">
                             <button onclick="copyVirtualCode(0,$('#virtualLink'))"  class="btn-outline-success input-group-text " data-toggle="tooltip" data-placement="top" title="Copy "><i class="fas fa-copy"></i></button>
                         </div>
                    <div class="input-group-append">
                    <button onclick="sendUrlToLogin()" class="btn-outline-dark input-group-text pl-5 pr-5">Edit</button>
                    </div>
                </div>
                        <!--div class="col-md col-12 form-group" data-for="email">
                            <input type="text" name="text" placeholder="Shortest Link for your host" readonly data-form-field="Email" class="form-control"  id="virtualLink">
                        </div-->
                        <div class=" d-flex justify-content-center">
                            <button type="submit" class="btn btn-warning display-4 " style="width: 20vw" onclick="shorten('{{csrf_token()}}')" id="shortenMyLinkBtn">Shorten my link</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="features5 cid-sqkn5ft9Qw" id="features6-r">



    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(255, 255, 255);">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-12 col-lg-6">
                <div class="card-wrapper mbr-flex">
                    <div class="card-box align-left">

                        <h5 class="card-title mbr-fonts-style align-left mb-3 display-5">
                            <strong>No Coding</strong>
                        </h5>
                        <p class="mbr-text mbr-fonts-style mb-3 display-4">
                            You don't have to code when you create your own site. Select one of available themes in the Mobirise sitebuilder.</p>
                        <div class="mbr-section-btn"><a href="" class="btn btn-warning display-4">Learn more</a></div>
                    </div>
                    <div class="img-wrapper img1 align-center">
                        <span class="mbr-iconfont mobi-mbri-setting mobi-mbri"></span>
                    </div>
                </div>
            </div>

            <div class="card col-12 col-lg-6">
                <div class="card-wrapper mbr-flex">
                    <div class="card-box align-left">

                        <h5 class="card-title mbr-fonts-style align-left mb-3 display-5">
                            <strong>Unique Styles</strong>
                        </h5>
                        <p class="mbr-text mbr-fonts-style mb-3 display-4">
                            Select the theme that suits you. Each theme in the Mobirise website building software contains a set of unique blocks.</p>
                        <div class="mbr-section-btn"><a href="" class="btn btn-warning display-4">Learn more</a></div>
                    </div>
                    <div class="img-wrapper img2 align-center">
                        <span class="mbr-iconfont mobi-mbri-users mobi-mbri"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pricing2 cid-sqXArokYXw" id="pricing2-17">



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 align-center col-lg-4">
                <div class="plan">
                    <div class="plan-header">
                        <h6 class="plan-title mbr-fonts-style mb-3 display-5">
                            <strong>Monthly</strong>
                        </h6>
                        <div class="plan-price">
                            <p class="price mbr-fonts-style m-0 display-1"><strong>$19</strong></p>
                            <p class="price-term mbr-fonts-style mb-3 display-7"><strong>Per month</strong>
                            </p>
                        </div>
                    </div>
                    <div class="plan-body">
                        <div class="plan-list mb-4">
                            <ul class="list-group mbr-fonts-style list-group-flush display-7">
                                <li class="list-group-item">Code Editor
                                </li><li class="list-group-item">Mobirise Kit
                                </li><li class="list-group-item">Form Builder
                                </li><li class="list-group-item">Popup Builder</li>
                            </ul>
                        </div>
                        <div class="mbr-section-btn text-center"><a href="" class="btn btn-warning display-4">Get started</a></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 align-center col-lg-4">
                <div class="plan">
                    <div class="plan-header">
                        <h6 class="plan-title mbr-fonts-style mb-3 display-5">
                            <strong>Yearly</strong>
                        </h6>
                        <div class="plan-price">
                            <p class="price mbr-fonts-style m-0 display-1"><strong>$19</strong></p>
                            <p class="price-term mbr-fonts-style mb-3 display-7"><strong>Per year</strong>
                            </p>
                        </div>
                    </div>
                    <div class="plan-body">
                        <div class="plan-list mb-4">
                            <ul class="list-group mbr-fonts-style list-group-flush display-7">
                                <li class="list-group-item">Code Editor
                                </li><li class="list-group-item">Mobirise Kit
                                </li><li class="list-group-item">Form Builder
                                </li><li class="list-group-item">Popup Builder</li>
                            </ul>
                        </div>
                        <div class="mbr-section-btn text-center"><a href="" class="btn btn-warning display-4">Get started</a></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 align-center col-lg-4">
                <div class="plan">
                    <div class="plan-header">
                        <h6 class="plan-title mbr-fonts-style mb-3 display-5">
                            <strong>Lifetime</strong>
                        </h6>
                        <div class="plan-price">
                            <p class="price mbr-fonts-style m-0 display-1"><strong>$399</strong></p>
                            <p class="price-term mbr-fonts-style mb-3 display-7"><strong>One time</strong>
                            </p>
                        </div>
                    </div>
                    <div class="plan-body">
                        <div class="plan-list mb-4">
                            <ul class="list-group mbr-fonts-style list-group-flush display-7">
                                <li class="list-group-item">Code Editor
                                </li><li class="list-group-item">Mobirise Kit
                                </li><li class="list-group-item">Form Builder
                                </li><li class="list-group-item">Popup Builder</li>
                            </ul>
                        </div>
                        <div class="mbr-section-btn text-center"><a href="" class="btn btn-warning display-4">Get started</a></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="info3 cid-sqNwYb1tLU" id="info3-13">





    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-12 col-lg-10">
                <div class="card-wrapper">
                    <div class="card-box align-center">
                        <h4 class="card-title mbr-fonts-style align-center mb-4 display-1">
                            <strong>Themes and Extensions</strong>
                        </h4>
                        <p class="mbr-text mbr-fonts-style mb-4 display-7">
                            2500+ beautiful website blocks, templates and themes help you start easily.</p>
                        <div class="mbr-section-btn mt-3"><a class="btn btn-warning display-4" href="">Get Started</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="form9 cid-sqkoFQ8FVA" id="form9-v">

    <div class="mbr-overlay"></div>
    <div class="container">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                <strong>Subscribe to us</strong>
            </h3>
            <h4 class="mbr-section-subtitle mbr-fonts-style align-center mb-0 mt-2 display-5">
                Form Subtitle
            </h4>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                <form action="https://mobirise.eu/" method="POST" class="mbr-form form-with-styler mx-auto" data-form-title="Form Name"><input type="hidden" name="email" data-form-email="true" value="Czo0K4lBVR3cgMlDdTogRp0oD+zCilrgufWv57kWByf8Lo7RIvaz1mfAv6nS1GoBfOHMVTYChCEq3giwimL2uig2Xzh9Wj1oBpyDJUSu90Jfswzq7TH97b+lRNUCkLIY">
                    <div class="row">
                        <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for filling out the form!</div>
                        <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">Oops...! some problem!</div>
                    </div>
                    <div class="dragArea row">
                        <div class="col-lg-12">
                            <p class="mbr-text mbr-fonts-style align-center mb-4 display-7"> Exclusive offers in your inbox</p>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 form-group" data-for="name">
                            <input type="text" name="name" placeholder="Name" data-form-field="name" class="form-control" value="" id="name-form9-v">
                        </div>
                        <div data-for="email" class="col-lg-4 col-md-12 col-sm-12 form-group">
                            <input type="email" name="email" placeholder="Email" data-form-field="email" class="form-control" value="" id="email-form9-v">
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 mbr-section-btn align-center"><button type="submit" class="btn btn-warning display-4">Submit</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="footer6 cid-sqkneDWu4b" once="footers" id="footer6-t">





    <div class="container">
        <div class="row content mbr-white">
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 display-7">
                    <strong>Address&nbsp;</strong></h5>
                <p class="mbr-text mbr-fonts-style display-7">
                    1234 Street Name <br>
                    City, AA 99999
                </p> <br>
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 mt-4 display-7">
                    <strong>Contacts</strong>
                </h5>
                <p class="mbr-text mbr-fonts-style mb-4 display-7">
                    Email: support@mobirise.com <br>
                    Phone: +1 (0) 000 0000 001 <br>
                    Fax: +1 (0) 000 0000 002
                </p>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 display-7">
                    <strong>Links</strong>
                </h5>
                <ul class="list mbr-fonts-style mb-4 display-4">
                    <li class="mbr-text item-wrap">
                        <a class="text-primary" href="https://mobirise.co/">Website builder</a>
                    </li>
                    <li class="mbr-text item-wrap">
                        <a class="text-primary" href="https://mobirise.co/">Download for Windows</a>
                    </li>
                    <li class="mbr-text item-wrap">
                        <a class="text-primary" href="https://mobirise.co/">Download for Mac</a>
                    </li>
                </ul>
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 mt-5 display-7">
                    <strong>Feedback</strong>
                </h5>
                <p class="mbr-text mbr-fonts-style mb-4 display-7">
                    Please send us your ideas, bug reports, suggestions! Any feedback would be appreciated.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <div class="google-map"><iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCZI5F_k6S1k46ujh0SNrapM89f7mJxd30&amp;q=NTU Library" allowfullscreen=""></iframe></div>
            </div>
            <div class="col-md-6">
                <div class="social-list align-left">
                    <div class="soc-item">
                        <a href="https://twitter.com/mobirise" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-twitter socicon" style="color: rgb(34, 165, 229); fill: rgb(34, 165, 229);"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="https://www.facebook.com/pages/Mobirise/1616226671953247" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-facebook socicon" style="color: rgb(68, 121, 217); fill: rgb(68, 121, 217);"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="https://www.youtube.com/c/mobirise" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-youtube socicon" style="color: rgb(237, 50, 50); fill: rgb(237, 50, 50);"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="https://instagram.com/mobirise" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-instagram socicon" style="color: rgb(237, 50, 50); fill: rgb(237, 50, 50);"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="https://plus.google.com/u/0/+Mobirise" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-googleplus socicon" style="color: rgb(255, 0, 0); fill: rgb(255, 0, 0);"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="https://www.behance.net/Mobirise" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-behance socicon" style="color: rgb(61, 105, 183); fill: rgb(61, 105, 183);"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-lower">
            <div class="media-container-row">
                <div class="col-sm-12">
                    <hr>
                </div>
            </div>
            <div class="col-sm-12 copyright pl-0">
                <p class="mbr-text mbr-fonts-style mbr-white display-7">
                    © Copyright 2025 Mobirise - All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</section>
  <section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;">
      <a href="https://mobirise.site/x" style="flex: 1 1; height: 3rem; padding-left: 1rem;background-color: black"></a>
      <p style="flex: 0 0 auto; margin:0; padding-right:1rem;">
  </section>

  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/nav-dropdown.js"></script>
  <script src="assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/parallax/jarallax.min.js"></script>
  <script src="assets/formstyler/jquery.formstyler.js"></script>
  <script src="assets/formstyler/jquery.formstyler.min.js"></script>
  <script src="assets/datepicker/jquery.datetimepicker.full.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/formoid/formoid.min.js"></script>

<script src="public/js/jquery.min.js"></script>

<script src="public/js/custom.js"></script>
  <link rel="stylesheet" href="{{ asset('public/css/confirmAlert.css') }}">
  <script type="text/javascript" src="{{asset('public/js/confirmAlert.js') }}"></script>
</body>
</html>
<script>

       // if(''==='1'){
           // window.location.reload();
          //  alert('working');
     //   }

</script>
