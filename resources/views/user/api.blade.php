@include('layout.profileHead')@include('layout.profileSidebar')
@php
    //$data=\App\Http\Controllers\settings::returnselectedSettings();

@endphp
<style>
    textarea {
        background: url(http://i.imgur.com/2cOaJ.png);
        background-attachment: local;
        background-repeat: no-repeat;
        padding-left: 35px;
        padding-top: 10px;
        border-color: #ccc;

        font-size: 13px;
        line-height: 16px;
    }

    .textarea-wrapper {
        display: inline-block;
        background-image: linear-gradient(#F1F1F1 50%, #F9F9F9 50%);
        background-size: 100% 32px;
        background-position: left 10px;
    }
    .wrapper{
        font-family: 'Quicksand', sans-serif;
    }
</style>
<div class="wrapper ">
    <div class="main-panel " id="ain-panelm">
        @include('layout.profileHeader')

        <div class="content" style="overflow:auto;height: 80vh;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">

                <h1 class="text-center" style="font-style: italic">Documentation</h1>
            <p>The basic concept of this developer console is to allow user to easily shorten url from its own website.
            we will provide you the simplest Api which is easiest to use and simple to handle response . </p>
        <h3> 1) <u>GET RESPONSE (non customized short link)</u>:</h3>
            <p>just simply call this link to get the response </p>
            <p style="color:darkblue;">http://localhost/fyp/link-short-developers-api/get-my-host-link?my-host-link=<u>{PASTE-YOUR-HOST-LINK}</u></p>
            <p>Sample Test :</p>
            <p>Lets take a google link and short by this api , simply run this link and get a short url</p>
            <a style="color:blue;" target="_blank" href="http://localhost/fyp/link-short-developers-api/get-my-host-link?my-host-link=https://google.com">http://localhost/fyp/link-short-developers-api/get-my-host-link?my-host-link=<u>https://google.com</u></a>
            <br><p class="mt-2">requires only one argument as '<b>my-host-link</b>'</p>
            <h5 class="text-center">{ GET Method Response } </h5>
            <p>If success (status : <span class="text-success">200</span>):  </p>
            <p>{ <br>  "short-link" : <a style="color:blue;" target="_blank" href="http://localhost/fyp/c3k8L">"http://localhost/fyp/c3k8L"</a> <br>}</p>
{{--            <form method="get" action="http://localhost/fyp/link-short-developers-api/get-my-host-link">--}}
{{--                <input type="text" name="my-host-link" value="https://google.com">--}}
{{--                <input name="_token" type="text" value="nRUNQlvR8ZMRsdPeG8fb2ufbw13MOXtfEKvvcDuy" hidden>--}}
{{--                <input type="submit" value="dsa">--}}
{{--            </form>--}}
            <hr>
            <h3> 2) <u>POST || RESPONSE (Customized short link)</u>:</h3>
            <p>just simply POST this link to get the response </p>
            <p style="color:darkblue;">http://localhost/fyp/link-short-developers-api-custom/get-my-host-link
            <p>Argument Required :</p>
           <table class="table table-striped mb-5 mt-5 table-bordered">
               <tr>
                   <td><b>custom_link</b></td>
                   <td>needs your custom link e.g. XXXXX</td>
                   <td></td>
                   <td></td>
               </tr>
               <tr>
                   <td><b>api_token</b></td>
                   <td>your TOKEN for input field</td>
                   <td width="30%"><input readonly  id="myApiTokenField" type="text" value="@php $token=  \Illuminate\Support\Facades\DB::table('apitokens')->where('user_id',session()->get('people')->uid)->pluck('token')->first(); echo $token; @endphp" class="form-control border-dark HcustomInput text-dark ">
                   </td>
                   <td>
                       @if($token=='')
                           <div class="btn btn-info generateTokenClass">Generate Token</div>
                       @else
                           <div class="btn btn-info generateTokenClass">Regenerate Token</div>
                       @endif
                   </td>
               </tr>
               <tr>
                   <td><b>host_link</b></td>
                   <td>needs your host link e.g. https://abc.xyz</td>
                   <td></td>
                   <td></td>
               </tr>
           </table>

            <p class="text-primary">Sample Test (integration) :</p>

            <div class="textarea-wrapper">
                <textarea readonly rows="10" cols="100">
<form action="http://localhost/fyp/link-short-developers-api-custom/get-my-host-link" method="post">

    <input type="text" name="custom_link" value="custom Link Here">
    <input type="text" name="api_token" value="Your Token Here">
    <input type="text" name="host_link" value="Your Host Link Here">
    <input type="submit">

</form>
                </textarea>
            </div>
            <p class="text-primary mt-2">using javascript to get response :</p>
            <div class="textarea-wrapper">
                <textarea readonly rows="27" cols="100">
<form id="getResponseFromApi">

    <input type="text" name="custom_link" value="custom Link Here">
    <input type="text" name="api_token" value="Your Token Here">
    <input type="text" name="host_link" value="Your Host Link Here">
    <input type="submit">

</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $('#getResponseFromApi').on('submit',function (event) {
        event.preventDefault();
        $.post(
            'http://localhost/fyp/link-short-developers-api-custom/get-my-host-link',
            $('#getResponseFromApi').serialize(),
            function (response) {
               // alert(response.host_link)
               // alert(response.title)
               // alert(response.custom_link)
            }
        )
    })
</script>

                </textarea>
            </div>
            <h5>{ POST Method Response } </h5>
            <p>If success (status : <span class="text-success">200</span>):  </p>
            <p>{<br>"host_link":"https://google.com",<br>"title":"Google",<br>"short_link":"http://localhost/fyp/customEdited"<br>}</p>

            <p>If Error (status : <span class="text-danger">400</span>)</p>
            {"error":"custom link already  exists!"}

            <p class="mt-3">OR</p>
            {"error":"Token error!"}



        </div>
</div>
@yield('scripts')
