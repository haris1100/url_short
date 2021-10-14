<html>
<head>
    <title>FYP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    {{--    ---------------------------------------JS----------------------------------------------------------}}

    <script type="text/javascript" src="{{asset('public/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{asset('public/js/bootstrap.min.js') }}"></script>
{{--    <script type="text/javascript" src="{{asset('public/js/jquery.min.js') }}"></script>--}}

    <script type="text/javascript" src="{{asset('public/js/npmJs.js') }}"></script>

    {{--    <script src="https://apis.google.com/js/api:client.js"></script>--}}
{{--    <script type="text/javascript" src="{{asset('public/js/custom.js') }}"></script>--}}
    <script type="text/javascript" src="{{URL::asset('public/js/prog.js') }}"></script>
{{--    <script type="text/javascript" src="{{asset('public/js/anime.min.js') }}"></script>--}}


    {{--    ---------------------------------------STYLE----------------------------------------------------------}}
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{URL::asset('public/css/custom.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/css/toastr.css')}}">
{{--    <link rel="stylesheet" href="{{asset('public/css/font-awesome.min.css')}}">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
{{--    <link--}}
{{--        href="https://fonts.googleapis.com/css?family=Oswald:400,700|Poppins"--}}
{{--        rel="stylesheet"--}}
{{--    />--}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">

    <!-- <script>
        (function (document, src, libName, config) {
            var script             = document.createElement('script');
            script.src             = src;
            script.async           = true;
            var firstScriptElement = document.getElementsByTagName('script')[0];
            script.onload          = function () {
                for (var namespace in config) {
                    if (config.hasOwnProperty(namespace)) {
                        window[libName].setup.setConfig(namespace, config[namespace]);
                    }
                }
                window[libName].register();
            };

            firstScriptElement.parentNode.insertBefore(script, firstScriptElement);
        })(document, 'https://secure.2checkout.com/checkout/client/twoCoInlineCart.js', 'TwoCoInlineCart',{"app":{"merchant":"250515364770"},"cart":{"host":"https:\/\/secure.2checkout.com"}});

    </script> -->
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




@section('script')
    <script type="text/javascript" src="{{asset('public/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('public/js/custom.js') }}"></script>

{{--    <script src="public/js/jquery.min.js"></script>--}}
{{--    <script src="public/js/custom.js"></script>--}}

@stop
