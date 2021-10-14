@php
    $data=\App\Http\Controllers\settings::returnselectedSettings();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    {{--    <link rel="apple-touch-icon" sizes="76x76" href="public/img/apple-icon.png">--}}
    {{--    <link rel="icon" type="image/png" href="public/img/favicon.png">--}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        FYP
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/css/now-ui-dashboard.css?v=1.5.0') }}">
    <script type="text/javascript" src="{{asset('public/js/jqslim.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('public/demo/demo.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/css/fa.css') }}">
    <style>
        ::-webkit-scrollbar {
            width: 7px;
            direction: ltr;

        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: {{$data->scrollusoc}};
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: {{$data->scrollusoc}};
        }

        body{
            overflow: hidden;
        }
        @media only screen and (max-width:900px){
            body{
                overflow: visible;
            }
        }
    </style>
</head>

<body>

<div class="modal fade" id="profileModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@section('scripts')
    <!--   Core JS Files   -->
    {{--<script src="public/js/core/jquery.min.js"></script>--}}
    {{--<script src="public/js/core/popper.min.js"></script>--}}
    {{--<script src="public/js/core/bootstrap.min.js"></script>--}}
    <script type="text/javascript" src="{{asset('public/js/bootstrap.min.js') }}"></script>

    {{--<script type="text/javascript" src="{{asset('public/js/core/popper.min.js') }}"></script>--}}
    <script type="text/javascript" src="{{asset('public/js/core/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('public/js/custom.js') }}"></script>
    <script type="text/javascript" src="{{asset('public/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    {{--<script type="text/javascript" src="{{asset('public/js/plugins/bootstrap-notify.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{asset('public/js/plugins/chartjs.min.js') }}"></script>--}}
    <script type="text/javascript" src="{{asset('public/js/now-ui-dashboard.min.js?v=1.5.0') }}"></script>
    {{--<script type="text/javascript" src="{{asset('public/demo/demo.js') }}"></script>--}}

{{--    <script src="public/js/plugins/perfect-scrollbar.jquery.min.js"></script>--}}
    <!--  Google Maps Plugin    -->
{{--    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>--}}
    <!-- Chart JS -->
    {{--<script src="public/js/plugins/chartjs.min.js"></script>--}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    {{--<!--  Notifications Plugin    -->--}}
    <link rel="stylesheet" href="{{ asset('public/css/confirmAlert.css') }}">
    <script type="text/javascript" src="{{asset('public/js/confirmAlert.js') }}"></script>

{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>--}}
    {{--<script src="public/js/plugins/bootstrap-notify.js"></script>--}}
    {{--<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->--}}
    {{--<script src="public/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->--}}
    {{--<script src="public/demo/demo.js"></script>--}}
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });
        setInterval(function () {
            $.get('{{url('checkLogout')}}',function (data,status) {
                    // alert(data);
                    if(data==='0'){
                        //alert('asd');
                        window.location.reload();
                    }
                }
            )
        },3000);
    </script>
</body>

</html>

@stop
