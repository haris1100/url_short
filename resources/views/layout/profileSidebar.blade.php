@php
    $data=\App\Http\Controllers\settings::returnselectedSettings();
//#172f41
@endphp

<div class="sidebar" style="background-color: {{$data->usbgc}};" >

    <div class="logo">

        <a href="javascript:void(0)" class="simple-text logo-normal text-center" style="color: {{$data->ustc}}">
            URL Shortner
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            {{--                <li class="active ">--}}
            {{--                    <a href="./dashboard.html">--}}
            {{--                        <i class=" design_app"></i>--}}
            {{--                        <p>Dashboard</p>--}}
            {{--                    </a>--}}
            {{--                </li>--}}
            <li>
                <a href="{{url('user/profile')}}" style="color: {{$data->ustc}}">
                    <i class="fas fa-info-circle" style="color: {{$data->ustc}}"></i>
                    <p>Profile</p>
                </a>
            </li>
            <li>
                <a href="{{url('user/links')}}" style="color: {{$data->ustc}}">
                    <i class="fas fa-link" style="color: {{$data->ustc}}"></i>
                    <p>links</p>
                </a>
            </li>
            <li>
                <a href="{{url('user/hosting')}}" style="color: {{$data->ustc}}">
                    <i class="fas fa-database" style="color: {{$data->ustc}}"></i>
                    <p>Hosting</p>
                </a>
            </li>
            <li>
                <a href="{{url('user/templates')}}" style="color: {{$data->ustc}}">
                    <i class="fab fa-html5" style="color: {{$data->ustc}}"></i>
                    <p>Templates</p>
                </a>
            </li>

            <li>
                <a href="{{url('user/api&Developers')}}" style="color: {{$data->ustc}}">
                    <i class="fas fa-laptop-code" style="color: {{$data->ustc}}"></i>
                    <p>API &nbsp;&&nbsp; Developer's &nbsp; Portal</p>
                </a>
            </li>

        </ul>
    </div>
</div>
