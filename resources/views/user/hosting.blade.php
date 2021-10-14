@include('layout.profileHead')@include('layout.profileSidebar')
@php
    //$data=\App\Http\Controllers\settings::returnselectedSettings();

@endphp
<div class="wrapper ">
    <div class="main-panel " id="ain-panelm">
@include('layout.profileHeader')

        <div class="content" style="overflow:auto;height: 80vh">
            <div class="row" id="appendAllMyHostedProjectsRow" >


            </div>


























        </div>
        </div>
    </div>
<div class="modal fade bd-example-modal-lg" id="createNewHosting" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <form class="mt-5 mb-5 p-4" id="hostingTypicalForm1">
                <input hidden type="text" value="{{csrf_token()}}" name="_token" id="_token">
                <div class="form-group">
                    <label for="projectHostName">Name of project</label>
                    <input type="text" name="projectHostName" id="projectHostName" class="form-control HcustomInput" >
                </div>
                <p class="text-danger" id="nameAlreadyExists" style="display: none">Name already exists!</p>
{{--                <div class="form-group mt-2">--}}
{{--                    <input type="number" name="NoOfPages" id="NoOfPages" class="form-control HcustomInput"  placeholder="Number of pages">--}}
{{--                </div>--}}
                <label for="NoOfPages">No. of pages:</label>
                <select class="js-example-basic-single form-control" style="width: 100%;" id="NoOfPages" name="NoOfPages">
                    @for($i=1;$i<=10;$i++)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                </select>
                <p style="font-size: 10px" class="text-info mt-2">More pages can be added from inside of project</p>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-info"> Add </button>
                    <button type="submit" class="btn btn-dark close-btn" data-dismiss="modal"> close </button>
                </div>
            </form>

        </div>

    </div>
</div>
@yield('scripts')
<script>
    loadAllMyHostingProjectsAndAppendToDiv();
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
