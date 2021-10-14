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


  <title>signup</title>
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

  <section class="form7 cid-sqNDxX3gvv" id="form7-15">


    <div class="container-fluid">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">Sign up and start shortening</h3>
            <h4 class="mbr-section-subtitle mbr-fonts-style align-center mb-0 mt-2 display-7">Already have an account? <a class="text-warning" href="login">Log in</a></h4>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                <form id="register-form" class="mbr-form form-with-styler mx-auto" >
 @csrf
                    <div class="dragArea row">
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="name">
                           <input type="email" onclick="$('.emailAlreadyExists').hide();" class="form-control" name="email" id="email" placeholder="Email"/>
                        </div>
		<p class="emailAlreadyExists text-warning text-center ml-2" style="display: none;">Email Already Exists!</p>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="email">
                            <input class="redme form-control"  type="password" name="pass" id="pass" placeholder="Password"/>
                        </div>
                        <div data-for="phone" class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <input class="redme form-control" type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                        </div>
<p class="passwordDoesNotmatch text-danger text-center ml-2" style="display: none">Password does not matches</p>
                        <div class="col-auto mbr-section-btn align-center"><button type="submit" class="btn btn-warning display-4">Signup<br></button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

  @include('hehe.footer')
</body>
</html>
