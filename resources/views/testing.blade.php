
{{--<form action="http://localhost/fyp/link-short-developers-api-custom/get-my-host-link" method="post">--}}
{{--    <input type="text" name="custom_link" value="lala">--}}
{{--    <input type="text" name="api_token" value="2HpimyE7ljwxMGAXFvSb3RTdkUBVON">--}}
{{--    <input type="text" name="host_link" value="google.com">--}}
{{--    <input type="submit">--}}
{{--</form>--}}
{{--<form action="http://localhost/fyp/link-short-developers-api-custom/get-my-host-link" method="post">--}}
{{--    <input type="text" name="custom_link" value="custom Link Here">--}}
{{--    <input type="text" name="api_token" value="Your Token Here">--}}
{{--    <input type="text" name="host_link" value="Your Host Link Here">--}}
{{--    <input type="submit">--}}
{{--</form>--}}

{{--@include('layout.headTag')--}}
{{--<script type="text/javascript" src="https://www.2checkout.com/checkout/api/2co.min.js"></script>--}}
{{--<form id="myCCForm" action="{{action('test@testPayments')}}" method="post">--}}
{{--    @csrf--}}
{{--    <input name="token" type="text" value="" />--}}
{{--    <div>--}}

{{--            Card Number--}}
{{--            <input id="ccNo" type="text" value="" autocomplete="off" required />--}}

{{--    </div>--}}
{{--    <div>--}}
{{--            Expiration Date (MM/YYYY)--}}
{{--            <input id="expMonth" type="text" size="2" required />--}}

{{--        <span> / </span>--}}
{{--        <input id="expYear" type="text" size="4" required />--}}
{{--    </div>--}}
{{--    <div>--}}

{{--            <span>CVC</span>--}}
{{--            <input id="cvv" type="text" value="" autocomplete="off" required />--}}

{{--    </div>--}}
{{--    <input type="submit" value="Submit Payment" />--}}
{{--</form>--}}
{{--<script type="text/javascript">--}}

{{--    // Called when token created successfully.--}}
{{--    var successCallback = function(data) {--}}
{{--        var myForm = document.getElementById('myCCForm');--}}

{{--        // Set the token as the value for the token input--}}
{{--        myForm.token.value = data.response.token.token;--}}

{{--        // IMPORTANT: Here we call `submit()` on the form element directly instead of using jQuery to prevent and infinite token request loop.--}}
{{--        myForm.submit();--}}
{{--    };--}}

{{--    // Called when token creation fails.--}}
{{--    var errorCallback = function(data) {--}}
{{--        if (data.errorCode === 200) {--}}
{{--            // This error code indicates that the ajax call failed. We recommend that you retry the token request.--}}
{{--        } else {--}}
{{--            alert(data.errorMsg);--}}
{{--        }--}}
{{--    };--}}

{{--    var tokenRequest = function() {--}}
{{--        // Setup token request arguments--}}
{{--        var args = {--}}
{{--            sellerId: "250515364770",--}}
{{--            publishableKey: "E6E500B8-34B1-498A-8227-BBB2F7AD8C83",--}}
{{--            ccNo: $("#ccNo").val(),--}}
{{--            cvv: $("#cvv").val(),--}}
{{--            expMonth: $("#expMonth").val(),--}}
{{--            expYear: $("#expYear").val()--}}
{{--        };--}}

{{--        // Make the token request--}}
{{--        TCO.requestToken(successCallback, errorCallback, args);--}}
{{--    };--}}

{{--    $(function() {--}}
{{--        // Pull in the public encryption key for our environment--}}
{{--        TCO.loadPubKey('production');--}}

{{--        $("#myCCForm").submit(function(e) {--}}
{{--            // Call our token request function--}}
{{--            tokenRequest();--}}

{{--            // Prevent form from submitting--}}
{{--            return false;--}}
{{--        });--}}
{{--    });--}}

{{--    TCO.loadPubKey('production', function() {--}}
{{--        TCO.requestToken(successCallback, errorCallback, args);});--}}
{{--</script>--}}
{{------------------------------------------------------------------------------------------------------}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-md-center mt-5">--}}
{{--        <div class="col-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title">Adding a dynamic product</h5>--}}
{{--                    <p class="card-text">--}}
{{--                        Click the button bellow to open the Inline Cart using a dynamic product.--}}
{{--                    </p>--}}
{{--                    <a href="javascript:void(0)" class="btn btn-success" id="buy-button" >Buy now!</a>--}}
{{--                    <button class="btn btn-primary" onclick="buyNow()">Buy now </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--https://secure.2checkout.com/checkout/buy?merchant=250515364770&dynamic=1&currency=USD&tpl=default&prod=esport&price=2&type=digital&qty=1&signature=d43c0eb44d13ccdc76f2d9528b136ddf901000e6715bb61aaf96ea252465b42d--}}
{{--https://secure.2checkout.com/checkout/buy?merchant=250515364770&tpl=one-column&prod=OGF3F1VO2K&qty=1--}}

{{--<script>--}}
{{--    // $('#buy-button').on('click', function() {--}}
{{--    //     TwoCoInlineCart.setup.setMode('DYNAMIC');--}}
{{--    //     TwoCoInlineCart.cart.setCurrency('USD');--}}
{{--    //--}}
{{--    //     TwoCoInlineCart.products.add({--}}
{{--    //         name: 'TT',--}}
{{--    //         quantity: 1,--}}
{{--    //         price: 20,--}}
{{--    //     });--}}
{{--    //--}}
{{--    // });--}}
{{--    // function buyNow() {--}}
{{--    //     TwoCoInlineCart.cart.checkout();--}}
{{--    // }--}}
{{--    $('#buy-button').on('click', function() {--}}
{{--        TwoCoInlineCart.products.add({--}}
{{--            code: "OGF3F1VO2K",--}}
{{--            quantity: 3--}}
{{--        });--}}

{{--    });--}}
{{--    function buyNow() {--}}
{{--        TwoCoInlineCart.cart.checkout();--}}
{{--    }--}}
{{--</script>--}}

{{--<style>--}}
{{--    @import "compass/css3";--}}

{{--    @import url(https://fonts.googleapis.com/css?family=Finger+Paint);--}}

{{--    body {--}}
{{--        background: black;--}}
{{--        overflow: hidden;--}}
{{--        font: 5vw/100vh "Finger Paint";--}}
{{--        text-align: center;--}}
{{--        color: transparent;--}}
{{--        backface-visibility: hidden;--}}
{{--    }--}}

{{--    .killEsport {--}}
{{--        display: inline-block;--}}
{{--        text-shadow: 0 0 0 whitesmoke;--}}
{{--        animation: smoky 5s 3s both;--}}
{{--    }--}}

{{--    span:nth-child(even){--}}
{{--        animation-name: smoky-mirror;--}}
{{--    }--}}

{{--    @keyframes smoky {--}}
{{--        60% {--}}
{{--            text-shadow: 0 0 40px whitesmoke;--}}
{{--        }--}}
{{--        to {--}}
{{--            transform:--}}
{{--                translate3d(15rem,-8rem,0)--}}
{{--                rotate(-40deg)--}}
{{--                skewX(70deg)--}}
{{--                scale(1.5);--}}
{{--            text-shadow: 0 0 20px whitesmoke;--}}
{{--            opacity: 0;--}}
{{--        }--}}
{{--    }--}}

{{--    @keyframes smoky-mirror {--}}
{{--        60% {--}}
{{--            text-shadow: 0 0 40px whitesmoke; }--}}
{{--        to {--}}
{{--            transform:--}}
{{--                translate3d(18rem,-8rem,0)--}}
{{--                rotate(-40deg)--}}
{{--                skewX(-70deg)--}}
{{--                scale(2);--}}
{{--            text-shadow: 0 0 20px whitesmoke;--}}
{{--            opacity: 0;--}}
{{--        }--}}
{{--    }--}}

{{--    @for $item from 1 through 21 {--}}
{{--    span:nth-of-type(#{$item}){--}}
{{--        animation-delay: #{(3 + ($item/10))}s;--}}
{{--    }--}}
{{--    }--}}
{{--</style>--}}
{{--<body>--}}
{{--<span class="killEsport">ESPORTS</span>--}}
{{--</body>--}}
{{--<script>--}}
{{--    setTimeout(function() {--}}
{{--        window.history.pushState({}, null, 'login');--}}
{{--    $.ajaxSetup ({--}}
{{--        cache: false--}}
{{--    });--}}
{{--    $('body').load(location.href.split('/').pop())--}}
{{--    }, 7000);--}}
{{--</script>--}}
{{--<span>E</span><span>S</span><span>P</span><span>--}}
{{--</span><span>O</span><span>R</span><span>T</span><span>S</span>--}}
{{--<span>k</span><span>y</span><span>&nbsp;</span>--}}
{{--<span>T</span><span>e</span><span>x</span><span>t</span>--}}
{{--<span>&nbsp;</span><span>E</span><span>f</span><span>f</span>--}}
{{--<span>e</span><span>c</span><span>t</span>--}}

{{--<body class="color-change-5x"></body>--}}
{{--    <link--}}
{{--        rel="stylesheet"--}}
{{--        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"--}}
{{--    />--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.js" integrity="sha512-E378bwaeZf1nwXeJGIwTB58A5gPt5jFU3u6aTGja4ZdRFJeo/N/REKnBgNZOZlH6JdnOPO98vg2AnSGaNfCMFQ==" crossorigin="anonymous"></script>--}}
{{--<style>--}}
{{--    .my-element {--}}
{{--        display: inline-block;--}}
{{--        margin: 0 0.5rem;--}}

{{--        animation: rubberBand; /* referring directly to the animation's @keyframe declaration */--}}
{{--        animation-duration: 1s; /* don't forget to set a duration! */--}}
{{--        animation-iteration-count: infinite;--}}

{{--    }--}}

{{--</style>--}}

{{--<button id="lala" class="btn btn-primary">lala</button>--}}
{{--<h1 class="animate__animated animate__bounce">An animated element</h1>--}}
{{--<h1 class="my-element " style="margin-top: 10%;margin-left: 10%">Esports</h1>--}}
{{--<p class="line-drawing-demo lines path">asdasdasda</p>--}}
{{--<svg viewBox="0 50 340 333">--}}

{{--    <path class="path" fill="white"  stroke="black" stroke-width="1" d="M66.039,133.545c0,0-21-57,18-67s49-4,65,8--}}
{{--  s30,41,53,27s66,4,58,32s-5,44,18,57s22,46,0,45s-54-40-68-16s-40,88-83,48s11-61-11-80s-79-7-70-41--}}
{{--  C46.039,146.545,53.039,128.545,66.039,133.545z"/>--}}

{{--</svg>--}}
{{--<style>--}}
{{--    .path {--}}
{{--        stroke-dasharray: 1000;--}}
{{--        stroke-dashoffset: 1000;--}}
{{--        animation: dash 5s linear alternate infinite;--}}
{{--    }--}}

{{--    @keyframes dash {--}}
{{--        from {--}}
{{--            stroke-dashoffset: 822;--}}
{{--        }--}}
{{--        to {--}}
{{--            stroke-dashoffset: 0;--}}
{{--        }--}}

{{--    }--}}
{{--</style>--}}
{{--<script>--}}
{{--    // const lala =document.querySelector('#lala');--}}
{{--    // // '.line-drawing-demo .lines path'--}}
{{--    // const onmouseover =()=>{--}}
{{--    anime({--}}
{{--        targets: '.line-drawing-demo .lines .path',--}}
{{--        strokeDashoffset: [anime.setDashoffset, 0],--}}
{{--        easing: 'easeInOutSine',--}}
{{--        duration: 1500,--}}
{{--        delay: function(el, i) { return i * 250 },--}}
{{--        direction: 'alternate',--}}
{{--        loop: true--}}
{{--    });--}}
{{--    anime({--}}
{{--        targets: lala,--}}
{{--        width:'100%',--}}
{{--       strokeDashoffset: [anime.setDashoffset, 0],--}}
{{--       easing: 'easeInOutSine',--}}
{{--       duration: 1500,--}}
{{--       delay: function(el, i) { return i * 250 },--}}
{{--       direction: 'alternate',--}}
{{--       loop: true--}}
{{--    });--}}

{{--</script>--}}
{{--<style>--}}
{{--    .color-change-5x{-webkit-animation:color-change-5x 8s linear infinite alternate both;animation:color-change-5x 8s linear infinite alternate both}--}}
{{--    @-webkit-keyframes color-change-5x {--}}
{{--        0% {--}}
{{--            background: #19dcea;--}}
{{--        }--}}
{{--        25% {--}}
{{--            background: #b22cff;--}}
{{--        }--}}
{{--        50% {--}}
{{--            background: #ea2222;--}}
{{--        }--}}
{{--        75% {--}}
{{--            background: #f5be10;--}}
{{--        }--}}
{{--        100% {--}}
{{--            background: #3bd80d;--}}
{{--        }--}}
{{--    }--}}
{{--    @keyframes color-change-5x {--}}
{{--        0% {--}}
{{--            background: #19dcea;--}}
{{--        }--}}
{{--        25% {--}}
{{--            background: #b22cff;--}}
{{--        }--}}
{{--        50% {--}}
{{--            background: #ea2222;--}}
{{--        }--}}
{{--        75% {--}}
{{--            background: #f5be10;--}}
{{--        }--}}
{{--        100% {--}}
{{--            background: #3bd80d;--}}
{{--        }--}}
{{--    }--}}

{{--</style>--}}
{{--</body>--}}
