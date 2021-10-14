@php
    $data=\App\Http\Controllers\settings::returnselectedSettings();

@endphp
<nav class="navbar navbar-expand-lg     navbar-absolute" style="background-color: {{$data->uhbgc}}">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="#pablo">URL Shortner</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
{{--                <li class="nav-item">--}}
{{--                    <input type="text" class="form-control HcustomInput mt-2 mr-5" placeholder="search link">--}}
{{--                </li>--}}
                <li class="nav-item">
                    <a class="nav-link" onclick="sessionStorage.clear()" href="{{action('link@logout')}}" style="font-size: 15px" data-toggle="tooltip" data-placement="top" title="logout">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
