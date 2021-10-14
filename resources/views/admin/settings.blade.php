<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    {{--    ---------------------------------------JS----------------------------------------------------------}}
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/css/select2.min.css') }}">
    <script type="text/javascript" src="{{asset('public/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{asset('public/js/bootstrap.min.js') }}"></script>
    <style>
        /*body{*/
        /*    background-color: #2c2c2c;*/
        /*}*/
        div{
            /*color: white;*/
            text-align: center;
        }
    </style>
</head>
<body>
@php
$data=\App\Http\Controllers\settings::returnDataForDefault();
$selectedData=\App\Http\Controllers\settings::returnselectedSettings();
@endphp
<div class="container">
    <form action="{{action('settings@settingsFormData')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <div class="form-group col-sm-4">
                <label for="uploadFielForLandingBg">Upload Landing Page Background Image</label>
                <input type="file" id="uploadFielForLandingBg" name="uploadFielForLandingBg" class="form-control">
            </div>
            <div class="form-group col-sm-4">
                <label for="CustomNameForBackgroundimage">Custom Name For Background image</label>

                <input type="text" class="form-control" name="CustomNameForBackgroundimage" id="CustomNameForBackgroundimage">
            </div>
            <div class="form-group col-sm-4">
            <label for="landingBg">Landing Page Background</label>
            <select name="landingBg" class="form-control"  id="landingBg">
            @foreach($data as $i)
                    <option value="{{$i->landingBg}}">{{$i->landingBg}}</option>
             @endforeach
            </select>
        </div>

        </div>
        <div class="row">
            <div class="form-group col-sm-4">
                <label for="LandingPageHeaderbgcolor">Landing Page Header bg-color</label>

                <input type="color" class="form-control" name="LandingPageHeaderbgcolor" id="LandingPageHeaderbgcolor">
            </div>
{{--            <div class="form-group col-sm-4">--}}
{{--                <input type="color" class="form-control">--}}
{{--            </div>--}}
            <div class="form-group col-sm-4">
                <label for="LandingPageHeaderLoginBtnColor">Landing Page Header login-btn-color</label>
                <select name="LandingPageHeaderLoginBtnColor" class="form-control"  id="LandingPageHeaderLoginBtnColor">
                    <option >primary</option>
                    <option >secondary</option>
                    <option >success</option>
                    <option >danger</option>
                    <option >warning</option>
                    <option >info</option>
                    <option >light</option>
                    <option >dark</option>
                    <option >outline-primary</option>
                    <option >outline-secondary</option>
                    <option >outline-success</option>
                    <option >outline-danger</option>
                    <option >outline-warning</option>
                    <option >outline-info</option>
                    <option >outline-light</option>
                    <option >outline-dark</option>

                </select>

            </div>
            <div class="form-group col-sm-4">
                <label for="LandingPageHeadertextcolor">Landing Page Header text-color</label>
                <input type="color" class="form-control" name="LandingPageHeadertextcolor" id="LandingPageHeadertextcolor">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-4">
                <label for="LandingPageHeaderLogintextcolor">Landing Page Header Login text-color</label>
                <select class="form-control" name="LandingPageHeaderLogintextcolor" id="LandingPageHeaderLogintextcolor">
                    <option >primary</option>
                    <option >secondary</option>
                    <option >success</option>
                    <option >danger</option>
                    <option >warning</option>
                    <option >info</option>
                    <option >light</option>
                    <option >dark</option>
                </select>
            </div>
            <div class="form-group col-sm-4">
                <label for="bgColorForUserHeader">Background Color For User Header</label>
                <input type="color" class="form-control" name="bgColorForUserHeader" id="bgColorForUserHeader">
            </div>
            <div class="form-group col-sm-4">
                <label for="BackgroundColorForUserSideBar">Background Color For User SideBar</label>
                <input type="color" class="form-control" name="BackgroundColorForUserSideBar" id="BackgroundColorForUserSideBar">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-4">
                <label for="UserSidebarTextColor">User Sidebar Text Color</label>
                <input  class="form-control" type="color" name="UserSidebarTextColor" id="UserSidebarTextColor">
            </div>
            <div class="form-group col-sm-4">
                <label for="UserScrollBaroverflowColor">User ScrollBar overflow Color</label>
                <input  class="form-control" type="color" name="UserScrollBaroverflowColor" id="UserScrollBaroverflowColor">
            </div>
            <div class="form-group col-sm-4">
                <label for="userHostingColorBoxes">User Hosting Box Color</label>
                <input  class="form-control" type="color" name="userHostingColorBoxes" id="userHostingColorBoxes">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-4">
                <label for="UserLinkTableColor">User Link Table Color</label>
                <input  class="form-control" type="color" name="UserLinkTableColor" id="UserLinkTableColor">
            </div>
        </div>
        <div class="form-group">
            <button class="btn-danger btn btn-lg mt-5">Save</button>
        </div>
    </form>
</div>
<script src="{{asset('public/js/jquery.min.js')}}"></script>

<script>
    $('#landingBg').val('{{$selectedData->landingBg}}').change();
    $('#LandingPageHeaderLoginBtnColor').val('{{$selectedData->landingHeaderLogin}}').change();
    $('#LandingPageHeaderbgcolor').val('{{$selectedData->landingHeader}}').change();
    $('#LandingPageHeadertextcolor').val('{{$selectedData->landinHeaderText}}').change();
    $('#LandingPageHeaderLogintextcolor').val('{{$selectedData->ltc}}').change();
    $('#bgColorForUserHeader').val('{{$selectedData->uhbgc}}').change();
    $('#BackgroundColorForUserSideBar').val('{{$selectedData->usbgc}}').change();
    $('#UserSidebarTextColor').val('{{$selectedData->ustc}}').change();
    $('#UserScrollBaroverflowColor').val('{{$selectedData->scrollusoc}}').change();
    $('#userHostingColorBoxes').val('{{$selectedData->uhbc}}').change();
    $('#UserLinkTableColor').val('{{$selectedData->ultbc}}').change();
    // window.onload = function() {
    //     if (window.jQuery) {
    //         // jQuery is loaded
    //         alert("Yeah!");
    //     } else {
    //         // jQuery is not loaded
    //         alert("Doesn't Work");
    //     }
    // }
</script>
</body>

</html>


