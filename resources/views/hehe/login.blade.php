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


  <title>login</title>
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.theme.css">
  <link rel="stylesheet" href="assets/datepicker/jquery.datetimepicker.min.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">

  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">




</head>
<body>

  <section class="form7 cid-sqMy4kBLq3" id="form7-11">


    <div class="container-fluid">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">LOGIN &amp; Start SHARING</h3>
            <h4 class="mbr-section-subtitle mbr-fonts-style align-center mb-0 mt-2 display-7">Don't have an account? <a class="text-warning" href="register">Sign Up</a></h4>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                <form id="login-form" class="mbr-form form-with-styler mx-auto" >
 <div style="display:none;" data-form-alert-danger="" class=" showerror alert alert-danger col-12">Wrong Email or Password!</div>
 @csrf
                    <div class="dragArea row">

                        <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="email">
                            <input type="email" name="email" placeholder="Email address" data-form-field="email" class="form-control" value="" id="email">
                        </div>
                        <div  class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <input type="password" name="your_pass" id="your_pass" placeholder="Password" data-form-field="phone" class="form-control" value="" >
                        </div>
                        <div class="col-auto mbr-section-btn align-center"><button type="submit" class="btn btn-warning display-4">Login<br></button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@include('hehe.footer')
</body>
</html>
