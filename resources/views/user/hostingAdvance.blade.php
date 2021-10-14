@include('layout.profileHead')

<style>
    hr {
        border: 0;
        height: 1px;
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
    }

    * {
        box-sizing: border-box;
    }

    /* Create two equal columns that floats next to each other */
    .column {
        float: left;
        width: 20%;
        padding: 10px;
      height: 100%;
    }
    .columns {
        float: left;
        width: 80%;

        height: 100%;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
        .column {
            width: 100%;
        }
        .columns {
            width: 100%;
        }
    }
    .wrapper{
        width:99%;






    }

    .cmd{
        position: relative;
        display: block;

        height: 100%;
        width: 100%;
        border: 1px solid #000000;
        /* border-radius: 4px; */
        overflow: hidden;

        box-shadow: 0px 8px 18px #4b1d3f;
    }

    /*
     * 1. Set position
     * 2. Set dimension
     * 3. Style
     */
    .title-bar{
        /* 1 */
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        /* 2 */
        width: 100%;
        height: 40px;
        /* 3 */
        display: block;
        color: #FFFFFF;
        line-height: 40px;
        font-weight: 600;
        background-color: #242424;
        text-align: center;
    }

    .tool-bar{
        position: absolute;
        top: 40px;
        left: 0;
        right: 0;
        display: block;
        width: 100%;
        height: 30px;
        line-height: 30px;
        background-color: #242424;
    }

    .tool-bar ul{
        list-style-type: none;
        margin: 0px;
        padding: 0px;
    }

    .tool-bar ul li{
        display: inline-block;
        margin: 0;
        padding: 0;
    }

    .tool-bar ul li a{
        padding: 0px 6px;
        text-decoration: none;
        color: #FFFFFF;
    }

    .tool-bar ul li a:hover{
        text-decoration: underline;
    }

    .textarea{
        position: relative;
        top: 70px;
        padding: 12px;


        width: 100%;
        height: 100%;

        background-color: #4b1d3f;
        border: none;
        color: #FFFFFF;
        margin: 0px;
        font-size: 0.8rem;
    }
    .dot {
        height: 15px;
        width: 15px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
    }
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
<div class="row">
    <div class="column" style="overflow:auto;height: 100vh">
        <div class="col-sm-12 mt-2 ml-1">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Start your Static Pages Hosting<i class="fa fa-arrow-right"></i>  <i style="display:none;" class="fas fa-spinner la-spinner fa-spin"></i></h5>

                </div>
            </div>
        </div>
        <!-- <div class="btn-group col-sm-12 justify-content-center ml-2" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-dark">HTML</button>
            <button type="button" class="btn" style="background-color: #0485cb">TEXT</button>
            <button type="button" class="btn btn-dark">UPLOAD</button>
        </div> -->

        <div class="form-group ml-2 col-sm-12 ">
            <label for="urlforspecficHOSTADV">Url of this page </label>
            <a href="javascript:void(0)"  data-toggle="tooltip" data-placement="top" title="copy url" class="float-right"><i class="fas fa-copy copyMainUrlFromHOSTAdvC text-secondary"></i></a>
            <a href="javascript:void(0)"  data-toggle="tooltip" data-placement="top" title="Add page link to my links manager" class="float-right mr-2"><i class="fas fa-plus text-success addpagelinktomylinkmanager"></i></a>
            <input type="text" readonly style="border-color: grey" class="form-control HcustomInput"  id="urlforspecficHOSTADV">
        </div>
        <div class="form-group ml-2 col-sm-12 " >
            <label for="selectPAgesInADVHOST">Pages</label>
            <a href="javascript:void(0)" onclick="deletePageFromHostAdvFC('{{$name}}')" class="float-right" data-toggle="tooltip" data-placement="top" title="Delete this page"><i class="fas fa-trash-alt deletePageFromHostAdvC text-danger"></i></a>
            <a href="javascript:void(0)" onclick="addNewPageTOMYADVHOSTJSFun('{{$name}}')" class="float-right mr-2" data-toggle="tooltip" data-placement="top" title="Add new page"><i class="far fa-plus-square addPageInHostAdvC text-info"></i></a>
            <br>
        <select style="width: 100%" class="js-example-basic-single form-control" id="selectPAgesInADVHOST" name="selectPAgesInADVHOST">
           @for($i=1;$i<=$page;$i++)
                <option value="{{$name}}[CuttmyEdge]{{$i}}">Page {{$i}}</option>
            @endfor
        </select>
        </div>



        <div class="form-group ml-2 col-sm-12 ">
            <label for="setCustomNameForEachPAgeADVHOST">Name of page</label>
            <input type="text" style="border-color: grey" class="form-control HcustomInput" id="setCustomNameForEachPAgeADVHOST">
        </div>
        <div class="d-flex justify-content-center">
        <div class="btn btn-info buttonToSaveAllTextAndNameOfHostADV">Save</div>

        </div>
        <hr>

        <form  method="post" action="{{route('uploadFilePicVidForADVHOST',[$name])}}" enctype="multipart/form-data">
            @csrf
        <div class="form-group ml-2 col-sm-12 " >
            <label for="uplaodPicVidFilForADVHOST">Upload Files</label>
            <br>
            <select style="width: 100%" class="js-example-basic-single form-control" id="uplaodPicVidFilForADVHOST" name="uplaodPicVidFilForADVHOST">
                <option value="jpg">Image</option>
                <option value="mp4">Video</option>
                <option value="Ahtml">HTML (Append to this file)</option>
                <option value="Rhtml">HTML (Replace with this file)</option>
                <option value="js">javascript file</option>
                <option value="css">CSS file</option>
                <!-- <option value="file">File</option> -->
            </select>
        </div>
        <div class=" ml-2 col-sm-12">
            <input type="file" id="fileUplaodForADVOST" name="fileUplaodForADVOST" class="form-control" style="text-overflow: ellipsis;white-space: nowrap; overflow: hidden; max-width: 50ch;">
        </div>
        <input type="text" hidden  id="fileNameFetchedByFile" name="fileNameFetchedByFile">
            <div class="d-flex justify-content-center">
                <button onclick="$('.buttonToSaveAllTextAndNameOfHostADV').click()" type="submit" class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Upload" ><i class="fas fa-cloud-upload-alt"></i></button>
            </div>
        </form>
        <div class="form-group ml-2 col-sm-12 " >
            <label for="uplaodPicVidFilForADVHOST">Select your File :</label>
            <select class="js-example-basic-single form-control" id="" name="" onchange="$('#temp2').val($(this).val())">
               @foreach($fileLinksVirtual as $key=>$link)
               @php
               if($link->file)
               $fileName=explode('/',$link->file);
              // echo end($fileName);
                @endphp
                <option value="http://localhost/fyp/file/{{$link->virtualLink}}">File {{++$key}} ({{end($fileName)}})</option>
               @endforeach
                <!-- <option value="file">File</option> -->
            </select>
        </div>
        <div class="form-group ml-2 col-sm-12 ">
        <label for="temp2">Link for your File(copy here)</label>
            <a href="javascript:void(0)"  data-toggle="tooltip" data-placement="top" title="copy url" class="float-right"><i class="fas fa-copy copySecondaryUrlFromHOSTAdvC text-secondary"></i></a>

            <input readonly class="HcustomInput  form-control border-danger" value="@php if(count($fileLinksVirtual)!=0) echo 'http://localhost/fyp/file/'.$fileLinksVirtual[0]->virtualLink;; @endphp" type="text" id="temp2">
        </div>
        <hr>
{{--        <div class="row">--}}
{{--            <div class="col-7"> <p class="mt-1 ml-2">Go live :</p></div>--}}
{{--            <div class="col-3"><label  class=" switch">--}}
{{--                    <input type="checkbox" id="liveMyProject" onclick="liveMyProject('{{$name}}')">--}}
{{--                    <span class="slider"></span>--}}
{{--                </label></div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-7"> <p class="mt-1 ml-2">Publish project :</p></div>--}}
{{--            <div class="col-3"> <label  class="switch">--}}
{{--                    <input type="checkbox" id="PublishMyProject" onclick="PublishMyProject('{{$name}}')">--}}
{{--                    <span class="slider"></span>--}}

{{--                </label>--}}
{{--            </div>--}}
{{--        </div>--}}

               <div class="d-flex justify-content-center">
           <p class="mt-1 mr-2 mr-5">Go live :</p>
           <label  class=" switch">
               <input type="checkbox" id="liveMyProject" onclick="liveMyProject('{{$name}}')">
               <span class="slider"></span>
           </label>
       </div>
        <div class="d-flex justify-content-center">
            <p class="mt-1 mr-2">Publish project :</p>
            <label  class="switch">
                <input type="checkbox" id="PublishMyProject" onclick="PublishMyProject('{{$name}}')">
                <span class="slider"></span>

            </label>

        </div>
        <div class="d-flex justify-content-center">
        <a href="javascript:void(0)"  data-toggle="modal" data-target="#projectPublicationModal" id="publishSettings" class="ml-2 text-info " style="font-size: 12px" >project publication settings</a>
        </div>

        <hr>
        <div class="d-flex justify-content-center">
        <div class="btn btn-danger " onclick="deleteMyEntireADVHOST('{{$name}}')">Delete Project</div>
        </div>

    </div>
    <div class="columns">
        <div class="col-sm-12"></div>
        <div class="wrapper">
            <div class="cmd">
                <div class="title-bar">HTML/CSS/JS EDITOR </div>
                <div class="tool-bar">
                    <ul class="ml-2">
                        <span class="dot bg-danger" ></span>
                        <span class="dot bg-warning"></span>
                        <span class="dot bg-success"></span>

                        <a data-toggle="tooltip" id="compileAndRunCodeButton" data-placement="top" title="compile and run" href="javascript:void(0)"  class=" float-right mr-5"><i style="font-size: 25px" class="fas fa-play text-white"></i></a>

                    </ul>

                </div>


                <textarea class="textarea textAreaForHTMLHOST" spellcheck="false" rows="20">

                </textarea>
            </div>
        </div>    </div>
</div>
<input type="text" hidden id="_token" value="{{csrf_token()}}">

<div class="modal fade" id="projectPublicationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
@yield('scripts')

<script>
    //multiple="multiple"
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    $('.la-spinner').show();

    setTimeout(function(){
        getAlldataIfSelectChangeForHostingADV();
        $('.la-spinner').hide();

    }, 1500);
    // if('getPageNo' in sessionStorage)
    //     selectPAgesInADVHOST.val(sessionStorage.getItem('getPageNo')).change();
    // else
    //     selectPAgesInADVHOST.prop("selectedIndex", 0);
    GetliveMyProject('{{$name}}');
</script>

