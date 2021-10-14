@php 
 $array=(\App\Http\Controllers\hosting::treeView($_GET['host']));
@endphp
@include('layout.profileHead')@include('layout.profileSidebar')

    <link rel="stylesheet" type="text/css" href="../newTemp/app-assets/vendors/jstree/themes/default/style.min.css">
    <link rel="stylesheet" type="text/css" href="../newTemp/app-assets/css/pages/extra-components-treeview.css">
    
<body class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu preload-transitions 2-columns   " data-open="click" data-menu="vertical-dark-menu" data-col="2-columns">
<div class="wrapper ">
    <div class="main-panel " id="ain-panelm">
        @include('layout.profileHeader')
        <div class="content ">
    <div id="main">
        <div class="row">
            
            <div class="col s12">
                <div class="container">
                    <!-- Treeview  -->
                    <div class="row">
                        <div class="col-sm-9 col-md-9">
                    <h1>File manager - {{$_GET['host']}}</h1>
                    </div>
                    <div class="col-sm-3 col-md-3">
                    <div class=" d-flex justify-content-end">
                              <a href="hosting/{{$_GET['host']}}" class="btn btn-info">Manage project Code</a>
                           </div>
                    </div>
                           </div>
                        <div class="row ">
                            <!-- treeview description -->
                           

                                <div class="card">
                                    <div class="card-content">
                                        
                                       
                                                <!--Contextmenu treeview example -->
                                                <div class="col-sm-12 col-md-12 col-lg-12 form-group mt-3">
                                                    <label for="search"> Search File</label>
                                                    <input type="text" class="searchtree form-control HcustomInput" id="search">
                                                </div>
                                                <div class="searchablejstree   mt-3">
                                                    <ul>
                                                    <li  class="jstree-open">HTML
                                                            <ul>
                                                                @foreach($array[0] as $key=>$html)
                                                                <li data-jstree='{"icon" : "jstree-file"}' onclick="AppendPageHtml('{{$html}}')">{{$html}}</li>
                                                               @endforeach
                                                            </ul>
                                                        </li>
                                                        <li class="jstree-open">CSS
                                                            <ul>
                                                            @foreach($array[1] as $key=>$html)
                                                            <?php $css=explode('...',$html) ?>
                                                                <li data-jstree='{"icon" : "jstree-file"}'>{{$css[0]}}.css</li>
                                                               @endforeach
                                                            </ul>
                                                        </li>
                                                        
                                                        <li class="jstree-open">Javascript
                                                            <ul>
                                                            @foreach($array[2] as $key=>$html)
                                                            <?php $js=explode('...',$html) ?>
                                                                <li data-jstree='{"icon" : "jstree-file"}'>{{$js[0]}}.js</li>
                                                               @endforeach
                                                            </ul>
                                                        </li>
                                                        <li class="jstree-open">Images
                                                            <ul>
                                                            @foreach($array[3] as $key=>$html)
                                                            <?php $images=explode('...',$html) ?>
                                                                <li data-jstree='{"icon" : "jstree-file"}'>{{$images[0]}}.jpg</li>
                                                               @endforeach                                                            </ul>
                                                        </li>
                                                        <li class="jstree-open">Videos
                                                            <ul>
                                                            @foreach($array[4] as $key=>$html)
                                                            <?php $videos=explode('...',$html) ?>
                                                                <li data-jstree='{"icon" : "jstree-file"}'>{{$videos[0]}}.mp4</li>
                                                               @endforeach                                                            </ul>
                                                        </li>
                                                         </ul>
                                                </div>
                                            </div>
                                           
                
                                          
                        </div>
                       
                    </div><!-- START RIGHT SIDEBAR NAV -->
                    
                    <!-- END RIGHT SIDEBAR NAV -->
                   
                </div>
                <div class="content-overlay"></div>
            </div>
        </div>
    </div>
        </div></div></div>
    <!-- END: Page Main-->

    <!-- BEGIN: Footer-->

    @yield('scripts')
    <!-- END: Footer-->
    <!-- BEGIN VENDOR JS-->
    <script src="../newTemp/app-assets/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="../newTemp/app-assets/vendors/jstree/jstree.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="../newTemp/app-assets/js/plugins.js"></script>
    <script src="../newTemp/app-assets/js/custom/custom-script.js"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="../newTemp/app-assets/js/scripts/extra-components-treeview.js"></script>
    <!-- END PAGE LEVEL JS-->
    <script>
        // function callDeleteNodeFunction(d){
        //     alert(d.reference);
        // }
        function AppendPageHtml(name){
            var chars = name.split('.');
                window.open('http://localhost/fyp/host/{{$_GET["host"]}}/'+chars[0],'_blank');
        }
    </script>
</body>

</html>