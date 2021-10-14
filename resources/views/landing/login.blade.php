@include('layout.headTag')
<body style=" background: url(./public/images/loginBACK.jpg);background-position: center; background-attachment: fixed; background-repeat: no-repeat; background-size: cover;">

<div class="container  " >
    <!-- Sing in  Form -->
    <section class="sign-in cantSelect mt-5">

        <div class="signin-content">

            <div class="signin-form">
                <h2 class="form-title ">Log in</h2>
                <form  id="login-form">
                    @csrf
                    <div class="form-group">
                        <label for="your_name"><i class="fa fa-user  material-icons-name"></i></label>
                        <input class="" type="email" name="email" id="email" placeholder="Email"/>
                    </div>
                    <div class="form-group">
                        <label for="your_pass"><i class="fa fa-lock material-icons-name "></i></label>
                        <input class="" type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <input class="" type="checkbox" name="remember-me" id="remember-me" class="agree-term" />--}}
{{--                        <label  for="remember-me" class="label-agree-term "><span><span></span></span>Remember me</label>--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <label  for="remember-me" class="label-agree-term "><span><span></span></span>Forgot Password? <a href="{{url('Forgot')}}"  class="text-warning">Rest Password</a></label>
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label  for="remember-me" class="label-agree-term "><span><span></span></span>Craete new Password? <a href="javascript:void(0)"  onclick="callCreateNewPass()" class="text-warning">Create</a></label>--}}
{{--                    </div>--}}
                    <div class="form-group form-button ml-1">
                        <button type="submit" class="btn  btn-outline-success" style="width: 227px">Login<i class="ml-2 fas fa-arrow-circle-right"></i></button>
                    </div>
                </form>
                <a href="{{url('register')}}"   class="signup-image-link  text-left text-dark ml-1 ">Dont have account? <span class="text-warning">Register</span> </a>
                <p style="margin-left: 37%">OR</p>



                <button class=" btn btn-outline-primary  ml-1 " style="width: 227px" >
                    Continue with <i class="fab fa-facebook "></i>
                </button>

                <button  id="customBtn" class=" btn btn-md btn-outline-danger mt-2 ml-1 " style="width: 227px" >
                    Continue with <i class="fab fa-google "></i>
                </button>



            </div>
            <div class="signin-image">
                <figure><img class="HideThisWhenMobile mt-lg-5 ml-0"  src="{{URL::asset('public/images/login.svg')}}" alt="sing up image"></figure>

            </div>

        </div>

    </section>
</div>
@yield('script')
</body>

