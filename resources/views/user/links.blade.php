@include('layout.profileHead')@include('layout.profileSidebar')
@php
    $data=\App\Http\Controllers\settings::returnselectedSettings();

@endphp
<style>
    .content{
        font-family: 'Quicksand', sans-serif;
    }
    input{
        font-family: 'Quicksand', sans-serif;
    }


</style>
<div class="wrapper ">
    <div class="main-panel " id="ain-panelm">
        @include('layout.profileHeader')
        <div class="content ">
{{--            <form id="">--}}
{{--                <div class="row ">--}}
{{--                    <div class=" col-lg-2"></div>--}}
{{--                    <div class="col-sm-10 col-lg-8">--}}
{{--                        <div class="input-group mb-3 active">--}}
{{--                            <div class="input-group-prepend">--}}
{{--                                <span class="input-group-text  text-white pr-3 pl-3" style="background-color: #172f41" id="basic-addon3"> localhost / fyp / </span>--}}
{{--                            </div>--}}
{{--                            <input autofocus spellcheck="false"  type="text" class="form-control" style="font-size: 20px;border-color: #172f41" id="virtualLinkEditor" aria-describedby="basic-addon3">--}}
{{--                            <input   type="text" hidden class="form-control" style="font-size: 20px;border-color: #f96332" id="originalLinkEditor" aria-describedby="basic-addon3">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-2"></div>--}}
{{--                </div>--}}
{{--                <div class="d-flex justify-content-center">--}}

{{--                    <button type="submit" class="btn  btn-lg" style="background-color: #172f41">save</button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--            <div class="col-lg-5 col-sm-12">--}}
{{--            <input  class="form-control HcustomInput" type="text">--}}
{{--            </div>--}}

            <div class="row">
                <div class="col-lg-5 col-sm-12 mt-2" >
                    <table class="table  text-white " style="margin-bottom: 0;background-color: {{$data->uhbgc}};border-top-left-radius: 10px;border-top-right-radius: 10px;" >
                        <tr>
                            <td style="font-size: 15px;">Links</td>
                            <td class="text-center " style="">
                              <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Reload Links" class="text-white"><i class="fas fa-sync-alt refreshBTNforTable"></i></a>
                            </td>
                            <td class="text-center " style="">   Clicks</td>

                        </tr>
                    </table>

                    <div style="height: 80vh;overflow:auto">
                        <div class="text-center " id="showGifBeforeLoading4" style="display: none">
                            <img src="../public/img/Flowing gradient.gif" alt="" style="margin-top: 5%;">
                        </div>
                  <table id="tableForLinksExtensions" class="table mb-5" style="background-color: {{$data->ultbc}}">

                  </table>
                    </div>
                </div>
{{--                <div class="col-lg-1 col-sm-12">--}}
{{--                    <style>--}}
{{--                        .vl {--}}
{{--                            border-left: 6px solid #172f41;--}}
{{--                            height: 80vh;--}}
{{--                        }--}}
{{--                    </style>--}}

{{--                    <div class="vl"></div>--}}
{{--                </div>--}}

                <div class="col-lg-1 col-sm-12">
                </div>
                <div class="col-xl-6 col-sm-12 ">
                    <button onclick="setFormForLinkAddition()" class="btn  float-right mb-5 add-btn " style="background-color: {{$data->uhbgc}}">add link</button>

                    <a id="advanceSettingsForLnikCogIcon" href="javascript:void(0)" data-toggle="modal" onclick="requestToPerformAction1=0;setModelForAdvanceSecuritySettings($('#secureIdForVirturalLinks').val())" data-target="#AdvanceLinkSettings" class="float-right mt-3 mr-3" style="font-size: 20px;color: {{$data->uhbgc}}" data-toggle="tooltip" data-placement="top" title="Advance Setting" ><i class="fa fa-cog"></i></a>
                    <a id="deleteLinkOne" href="javascript:void(0)"  class="float-right mt-3 mr-3" style="font-size: 20px;color: {{$data->uhbgc}}" data-toggle="tooltip" data-placement="top" title="Delete This Link" ><i class="fa fa-trash"></i></a>

                    <a id="infoIconForStats"  href="javascript:void(0)" onclick="if(sessionStorage.getItem('urlForEditFromIndex')!==null)  this.href='http://localhost/fyp/'+sessionStorage.getItem('urlForEditFromIndex')+'+';" target="_blank"  class="float-right mt-3 mr-3" style="font-size: 20px;color: {{$data->uhbgc}}" data-toggle="tooltip" data-placement="top" title="statistics of this link" ><i class="fas fa-chart-bar"></i></a>
                    <a id="starThisLinkId" href="javascript:void(0)"    class="float-right mt-3 mr-3" style="font-size: 20px;color: {{$data->uhbgc}}" data-toggle="tooltip" data-placement="top" title="star this link" ><i class="far fa-star"></i></a>
                    <a id="qrCodeButton" onclick="getQrCode()" data-toggle="modal" data-target="#qrCodeModel" href="javascript:void(0)"    class="float-right mt-3 mr-3" style="font-size: 20px;color: {{$data->uhbgc}}" data-toggle="tooltip" data-placement="top" title="qr code of this link" ><i class="fas fa-qrcode"></i></a>
                    <a  id="redirectionIcon" href="javascript:void(0)" onclick="if(sessionStorage.getItem('urlForEditFromIndex')!==null)  this.href='http://localhost/fyp/'+sessionStorage.getItem('urlForEditFromIndex');" target="_blank"   class="float-right mt-3 mr-3" style="font-size: 20px;color: {{$data->uhbgc}}" data-toggle="tooltip" data-placement="top" title="redirect link on external tab" ><i class="fas fa-external-link-alt"></i></a>

                    <a id="searchBar" onclick="standarizeSearchBarButton()" href="javascript:void(0)"    class="float-right mt-3 mr-3" style="font-size: 20px;color: {{$data->uhbgc}}" data-toggle="tooltip" data-placement="top" title="search link" ><i class="fa fa-search"></i></a>
                    <input id="serBarInput"  placeholder="search link" type="text" class="float-right mt-3 mr-3 p-1 HcustomInput" style="font-size: 10px;display: none;border-color: {{$data->uhbgc}};border-left-width: 5px"  >

                    <form id="mainLinkEditorAdderFormScript">
                    @csrf

                        <input type="text" hidden id="secureIdForVirturalLinks" name="secureIdForVirturalLinks">

                        <div class="form-group OriginalLinkAdder mt-5" >
                            <label for="OriginalLinkAdder" class="mt-5">URL</label>
                            <input placeholder="Link to host" spellcheck="false" name="link"  type="text" class="form-control HcustomInput" style="font-size: 20px;border-color: {{$data->uhbgc}};border-left-width: 5px" id="OriginalLinkAdder" aria-describedby="basic-addon3">
                        </div>
                        <div class="form-group TitleLinkEditor">
                            <label for="TitleLinkEditor" >Title</label>
                            <input type="text"  class="form-control HcustomInput" name="newTitle" style="font-size: 20px;border-color: {{$data->uhbgc}};border-left-width: 5px" id="TitleLinkEditor" aria-describedby="basic-addon3">
                        </div>
                        <label for="virtualLinkEditor">Short Link</label>
                        <div class="form-group input-group mb-3 virtualLinkEditor">
                            <div class="input-group-prepend " >
                                <button type="button" onclick="copyVirtualCode(1,$('#virtualLinkEditor'))" style="border-color: {{$data->uhbgc}};border-left-width: 5px;border-radius: 0" class="input-group-text pr-2 " ><i class="fas fa-copy" data-toggle="tooltip" data-placement="top" title="Copy " style="color: {{$data->usbgc}};"></i><span id="spanforButtonForHideAfterCoping" style="font-size: 10px;color: {{$data->usbgc}};display: none">Copied!</span></button>

                                <span class="input-group-text" style="border-color: {{$data->uhbgc}};" id="basic-addon3"><b>localhost/fyp/</b></span>
                            </div>
                            <input  spellcheck="false"  type="text" class="form-control HcustomInput" name="newVirtualLink" style="font-size: 20px;border-color: {{$data->uhbgc}};" id="virtualLinkEditor" aria-describedby="basic-addon3">
                        </div>


                        <input type="text" id="_token" name="_token" hidden value="{{csrf_token()}}">
                        <div class="d-flex justify-content-center mt-3">
                         <button type="button" class="btn  btn-lg btn-submit" style="background-color: {{$data->uhbgc}}">save</button>
                         <button type="submit" class="btn  btn-lg btn-add" style="background-color: {{$data->uhbgc}};display: none">Add</button>

                       </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
</div>
<div class="modal fade"  data-backdrop="static"  id="AdvanceLinkSettings" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content AdvanceLinkSettings  " style="border-radius: 15px;" >
{{--            <div class="modal-header">--}}
{{--            background-color: {{$data->ultbc}}--}}
{{--                <h5 class="modal-title" id="exampleModalLongTitle" >Advance Link Security</h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
            <h4 class="text-center">Advance Settings </h4>
            <form id="advanceSettingForMyLinkForm">
            <div class="modal-body text-dark" style=" font-family: 'Quicksand', sans-serif;">

                    @csrf
                <input type="text" hidden name="secureIdCopy1" id="secureIdCopy1">
                    <div class="row ">
                <div class="custom-control custom-switch text-center col-sm-6 mt-2">
                    <input type="checkbox" value="1" class="custom-control-input" name="switch1" id="switch1">
                    <label class="custom-control-label " for="switch1">Require one Time Password on link</label>

                </div>
                <div class="form-group  col-sm-6">
                    <input type="password"   id="passwordForOTP" placeholder="Enter Password " name="passwordForOTP" class="form-control HcustomInput"/>

                <div class="form-group mt-1">
                    <input type="checkbox" id="showOTP" >
                    <label for="showOTP">show password</label>
                    <p style="font-size: 10px" class="text-danger">you can't view password after saving it due to encryption mode, however you can change it.</p>
                </div>
                </div>
                    </div>
                <div class="row">
                    <div class="col-lg-6 col-xl-6 col-sm-12 form-group ">
                        <p class="ml-3">allow others to view statistics of this link :</p>
                        <label class="form-check-label ml-5" for="radio123">
                            <input type="radio" class="form-check-input" id="radio123" name="statVisibility" value="yes" >Yes
                        </label>
                        <label class="form-check-label ml-5" for="radio234">
                            <input type="radio" class="form-check-input" id="radio234" name="statVisibility" value="no">No
                        </label>

                    </div>
{{--                    <div class="form-group col-lg-6 col-sm-12">--}}
{{--                        <label for="sortyourlink">sort your link</label>--}}
{{--                        <input style="font-size: 15px" name="sortyourlink" class="form-control HcustomInput" id="sortyourlink">--}}
{{--                    </div>--}}
                    <div class="form-group col-lg-6 col-sm-12">
                        <label for="sortyourlink">sort your link</label><br>
                        <select class="js-example-basic-singles form-control" style="width: 100%" id="sortyourlink" name="sortyourlink">

                            <!-- <option value="file">File</option> -->
                        </select>
                    </div>
                </div>
{{--                <div class="row">--}}
{{--                    <div class="form-group col-lg-6 col-sm-12">--}}
{{--                        <label for="sortyourlink">sort your link</label><br>--}}
{{--                        <select class="js-example-basic-singles form-control" style="width: 100%" id="" name="">--}}

{{--                        <!-- <option value="file">File</option> -->--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
{{--                <button type="button" class="btn btn-danger">Delete Link</button>--}}
                <button type="submit" class="btn" style="background-color: {{$data->uhbgc}}">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade "  id="qrCodeModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered model-sm" role="document">
        <div class="modal-content bg-dark">
        <div class="">
            <div class="modal-body">
                <div id="qrCodeDiv" class="d-flex justify-content-center"></div>
            </div>
        </div>

        </div>
    </div>
</div>
@yield('scripts')
<script>

if(sessionStorage.getItem('OTF1')==='1'){
    addLinkByShiftingLinkFromLogin();
}
fetchLinksDataForTable();
    let hexcolor ='{{$data->ultbc}}';
    hexcolor = hexcolor.replace("#", "");
    var r = parseInt(hexcolor.substr(0,2),16);
    var g = parseInt(hexcolor.substr(2,2),16);
    var b = parseInt(hexcolor.substr(4,2),16);
    var yiq = ((r*299)+(g*587)+(b*114))/1000;
    $('#tableForLinksExtensions').css('color',(yiq >= 128) ? 'black' : 'white');
    $('.AdvanceLinkSettings').css('color',(yiq >= 128) ? 'black' : 'white');
     $('#tableForLinksExtensions').on('mousedown', false);


if(sessionStorage.getItem('urlForEditFromIndex')===null){
    $('.add-btn').click();
}
</script>
