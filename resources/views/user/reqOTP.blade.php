@if(session()->get('id'))
@include('layout.headTag')
<style>
    body{
        background-color: white;
    }
</style>
<form id="reqOTPforsecureLinkSinglePageOtpIDpassForm" style="position:relative;top: 35%">
    @csrf
<input type="text" hidden  value="{{session()->get('id')}}" id="secureIdCopy2" name="secureIdCopy2">
<div >
    <input autofocus  type="password" name="reqOTPforsecureLinkSinglePageOtpIDpass" id="reqOTPforsecureLinkSinglePageOtpIDpass" class="form-control text-center" placeholder="Password" style="border-width: 0;width: 100%;font-size: 70px">
</div>
</form>
@yield('script')
@else
<h3 style="text-align: center; margin-top: 20%">Secure OTP Destroyed. Please Don't Refresh Page. Run the link again to type Password </h3>
@endif

