@include('layout.headTag')
<body style=" background: url(./public/images/pexels-lucie-liz-3165335.jpg);background-position: center; background-attachment: fixed; background-repeat: no-repeat; background-size: cover;">

<div class="container bg-custom-dark " style="margin-top: 10vh">
    <!-- Sing in  Form -->
    <section class="sign-in cantSelect">

        <div class="signin-content">

            <div class="signin-form">
                <h2 class="form-title">Create Your New Password</h2>
                <form method="POST" class="register-form mt-lg-5" id="login-form">
                    <div class="form-group">
                        <label for="your_pass"><i class="fa fa-lock material-icons-name"></i></label>
                        <input class="bg-custom-dark " type="password" name="your_pass" id="hjhj" placeholder="Enter New Password"/>
                    </div>

                    <div class="form-group">
                        <label for="your_pass"><i class="fa fa-lock material-icons-name"></i></label>
                        <input class="bg-custom-dark " type="password" name="your_pass" id="hjhj" placeholder="Confirm New Password"/>
                    </div>


                    <div class="form-group form-button ml-1">
                        <button type="button" class="btn  btn-outline-success" style="width: 227px">Create Password<i class="ml-2 fas fa-arrow-right"></i></button>
                    </div>
                </form>



            </div>
            <div class="signin-image">
                <figure><img class="HideThisWhenMobile"  src="{{URL::asset('public/images/CreateNewPassword.svg')}}" alt="sing up image"></figure>

            </div>

        </div>

    </section>
</div>

</body>


