@include('layout.headTag')
<body style="background-color: white;">
<div class="container bg-custom-dark" style="margin-top: 10vh">
    <!-- Sing in  Form -->
    <section class="sign-in cantSelect">
        <div class="signin-content">
            <div class="signin-form">
                <h2 class="form-title ">Reset your Credentials?</h2>
                <form method="POST" class="register-form mt-lg-5" id="login-form">
                    <div class="form-group">
                        <label for="your_name"><i class="fa fa-envelope  material-icons-name"></i></label>
                        <input  type="email" name="your_name" id="hjhj" placeholder="Enter your E-mail Address"/>
                    </div>
                    <div class="form-group form-button ml-1">
                        <button type="button" class="btn  btn-outline-info" style="width: 227px">Rest Password<i class="ml-2 fas fa-arrow-right"></i></button>
                    </div>
                </form>
            </div>
            <div class="signin-image">
                <figure><img class="HideThisWhenMobile"  src="{{URL::asset('public/images/forgot.svg')}}" alt="sing up image"></figure>
                <a href="javascript:void(0)"  onclick="callRegister()" class="signup-image-link  mr-3">Dont have account? <span class="text-warning">Register</span> </a>
            </div>
        </div>
    </section>
</div>
</body>


