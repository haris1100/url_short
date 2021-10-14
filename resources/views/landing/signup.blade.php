@include('layout.headTag')
<body style="background-image: url(./public/images/signupBACK.png); background-position: center; background-attachment: fixed; background-repeat: no-repeat; background-size: cover; " >

<div class="container ">
    <section class="signup cantSelect mt-5" >

        <div class="signup-content" >
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                <form  id="register-form">
                    @csrf
{{--                    <div class="form-group">--}}
{{--                        <label for="name"><i class="fa fa-user material-icons-name"></i></label>--}}
{{--                        <input   type="text" name="name" id="name" placeholder="username"/>--}}
{{--                    </div>--}}

                    <div class="form-group ">
                        <label for="email"><i class="fa fa-envelope redme material-icons-name"></i></label>
                        <input type="email" onclick="$('.emailAlreadyExists').hide();" name="email" id="email" placeholder="Email"/>
                    </div>
                    <p class="emailAlreadyExists text-warning" style="display: none;">Email Already Exists!</p>
                    <div class="form-group">
                        <label for="pass"><i class="fa fa-lock material-icons-name"></i></label>
                        <input class="redme"  type="password" name="pass" id="pass" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <label for="re-pass"><i class="fa fa-lock material-icons-name"></i></label>
                        <input class="redme" type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                    </div>
                    <p class="passwordDoesNotmatch text-danger" style="display: none">Password does not matches</p>

{{--                    <div class="form-group">--}}
{{--                        <input class=" text-light"  type="checkbox" name="agree-term" id="agree-term" class="agree-term" />--}}
{{--                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>--}}
{{--                    </div>--}}

                    <div class="form-group form-button mt-4 ">
                        <button  type="submit" class="btn btn-outline-success" style="width: 227px">Register<i class="ml-2 fas fa-arrow-circle-right"></i></button>
                    </div>
                </form>
                <a href="{{url('login')}}" class="signup-image-link mt-1 mb-5 text-left text-dark">Already a Member? <span class="text-warning">Login</span></a>

            </div>

            <div class="signup-image ">
                <figure><img  class="HideThisWhenMobile" src="./public/images/signup.svg" alt="sing up image"></figure>

{{--                <button class=" btn btn-md btn-outline-primary mt-3 ml-4 mt " style="width: 227px" >--}}
{{--                    Continue with <i class="fab fa-facebook "></i>--}}
{{--                </button>--}}

{{--                <button  id="customBtn" class=" btn btn-md btn-outline-danger mt-3 ml-4   mt " style="width: 227px" >--}}
{{--                    Continue with <i class="fab fa-google "></i>--}}
{{--                </button>--}}

            </div>


        </div>

    </section>
</div>
@yield('script')
</body>


