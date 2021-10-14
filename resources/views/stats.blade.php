@include('layout.headTag')
<script src="https://cdn.jsdelivr.net/npm/svg-pan-zoom@3.6.1/dist/svg-pan-zoom.min.js"></script>

<link href="../public/svgMap-master/demo/html/demo.css" rel="stylesheet">
<link href="../public/svgMap-master/dist/svgMap.css" rel="stylesheet">
<script src="../public/svgMap-master/dist/svgMap.js"></script>
<style>
    body{
        background: white;
    }

    @media only screen and (max-width: 600px) {
        body {
            overflow-x: hidden;
        }
        card{
            margin: 0;
        }
    }
</style>
<script>
    function load_graph_for_daily_clicks(dates,clicks) {


        var dps = [];
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: ""
            },
            axisX:{
                valueFormatString: "DD MMM, YYYY",
                crosshair: {
                    enabled: true,
                    snapToDataPoint: true
                }
            },
            axisY: {
                title: "Number of Clicks",
                includeZero: true,
                crosshair: {
                    enabled: true
                }
            },
            toolTip:{
                shared:true
            },
            legend:{
                cursor:"pointer",
                verticalAlign: "bottom",
                horizontalAlign: "left",
                dockInsidePlotArea: true,
                itemclick: toogleDataSeries
            },
            data: [{
                type: "line",
                showInLegend: true,
                name: "Total Clicks",
                markerType: "square",
                xValueFormatString: "DD MMM, YYYY",
                color: "#F08080",
                dataPoints:
                dps
                // [

                // { x: new Date(2017, 0, 3), y: 650 },

                //]
            },

            ]
        });
        for(let j=0;j<dates.length;j++) {
            let new_date=dates[j].split('-');
            let year=new_date[0];
            let month=new_date[1];
            let day=new_date[2];
            dps.push({
                x: new Date(year, (month-1), day), y: clicks[j]
            });
        }

        chart.render();

        function toogleDataSeries(e){
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else{
                e.dataSeries.visible = true;
            }
            chart.render();
        }

    }



</script>
{{--<p class="text-center">The 1st graph is for testing new library</p>--}}
{{--<canvas id="myChart" style="height: 300px; width: 100%;"></canvas>--}}
{{--<canvas id="myChart2" style="height: 300px; width: 100%;"></canvas>--}}
{{--<div id="countdown" class="text-right"></div>--}}
<div class=" d-flex justify-content-end mt-1 mr-1 " >
    <button type="button" id="downlaodstatsasPDF" style="display: none" onclick="downlaodstatsasPDF('http://localhost/fyp/stats-of-link-clicks-and-visits/{{$link}}')" class="btn  btn-outline-info btn-md text-dark" style="width: 20%">Download stats as pdf</button>
</div>
<p id="show-p-if-days-less"  style="display: none;margin-top: 10%" class="text-center"></p>
<p id="show-p-if-wrong-link"  style="display: none;margin-top: 10%" class="text-center">There is no link of such Type or statistics visibility is denied by localhost/fyp/{{$link}} manager </p>
<p id="Error-message"  style="display: none;margin-top: 10%" class="text-center">Something went wrong!</p>
<p id="no-clicks"  style="display: none;margin-top: 10%" class="text-center">There is no click on this link!</p>
<div class="container-fluid">
    <div class="card  m-5">
        <div class="card-header text-center h5">Total Clicks on localhost/fyp/{{$link}}</div>
        <div class="card-body">
            <div id="chartContainer"   style="height: 300px; width: 100%;" class="mb-5 col-sm-12 mt-5">
                <div class="text-center" id="showGifBeforeLoading1">
                    <img src="../public/img/Flowing gradient.gif" alt="" style="margin-top: 10%">
                </div>
            </div>
        </div>
    </div>
</div>

{{--    <hr>--}}
<div class="container-fluid">
    <div class="card-deck">
        <div class="col-sm-12 col-xl-6 col-lg-6">
            <div class="card " >
                <div class="card-header">Continents vise clicks ratio</div>
                <div class="text-center showGifBeforeLoading2 mt-3"  style="display: none">
                    <img src="../public/img/Flowing gradient.gif" alt="" style="">
                </div>
                <div class="card-body">
                    <div id="chartContainerforpie" style="height: 300px; width: 100%;"></div>

                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6 col-lg-6">
            <div class="card" >
                <div class="card-header">Device accessibility</div>
                <div class="card-body">
                    <div id="chartContainerForColumnGraph" class="" style="height: 300px; width: 100%;"></div>
                </div>
            </div>
        </div>

    </div>
</div>
{{--        <hr>--}}

<div class="container-fluid ">
    <div class="card  m-5">
        <div class="card-header text-center h5">  Clicks Ratios Per Country Address</div>
        <div class="card-body">
            <div class="text-center showGifBeforeLoading2 mt-3"  style="display: none">
                <img src="../public/img/Flowing gradient.gif" alt="" style="">
            </div>
            <div id="countryBarGraph" style="height: 300px; width: 100%;" class=""></div>

        </div>
    </div>
</div>


{{--   <hr>--}}
{{--<div class="row">--}}
{{--<div class="col-sm-12 col-xl-5 col-lg-5 mt-5 textDataForPieGraph" style="display: none">--}}
{{--<ul>--}}
{{--        <li>Graph is configured as device accessibility </li>--}}
{{--        <li>Fetching the data of device isn't ilegal and can be used in many purposes</li>--}}
{{--        <li>Link admin must know on which device the link is accessed </li>--}}
{{--        </ul>--}}
{{--</div>--}}
{{--<div class="col-sm-12 col-xl-1 col-lg-1 mt-5"></div>--}}
{{--    <div style="display: none" class="col-sm-12 col-xl-5 col-lg-5 mt-5 rawStats">--}}

{{--    </div>--}}
{{--    <div class="col-sm-12 col-xl-1 col-lg-1 mt-5"></div>--}}
{{--    </div>--}}

{{---------------------------------------------------------------------------}}
<div class="demo-container p-5">
    {{--    <h2>Clicks Per Country</h2>--}}
    <div class="text-center " id="showGifBeforeLoading3" style="display: none">
        <img src="../public/img/Flowing gradient.gif" alt="" style="margin-top: 5%;">
    </div>
    <div id="svgMapPersonHeight"></div>
    <script src="../public/svgMap-master/demo/html/data/personHeight.js"></script>
    <script src="../public/svgMap-master/demo/html/local/countriesEN.js"></script>
    <script src="../public/js/ajaxMoment.js"></script>
    <script src="../public/js/charts.js"></script>

</div>
{{-----------------------------------------------------------------------------}}
@yield('script')
<script>


    // function set_countdown() {
    //     var timeleft = 100;
    //     var downloadTimer = setInterval(function () {
    //         if (timeleft <= 0) {
    //             clearInterval(downloadTimer);
    //             document.getElementById("countdown").innerHTML = "Refreshing";
    //         } else {
    //             document.getElementById("countdown").innerHTML = "graph refreshes in " + timeleft + " seconds ";
    //         }
    //         timeleft -= 1;
    //     }, 1000);
    // }
    // setInterval(function(){
    $('.fluid-container').hide();
    //         get_stats_and_start_graph();
    //
    //     },
    //     100000);
    setTimeout(function(){
            get_stats_and_start_graph();
            $('#showGifBeforeLoading1').hide();

            //  $('.showGifBeforeLoading2').hide();
            $('.rawStats').show();

        },
        2000);

    function get_stats_and_start_graph() {
        $.ajax({
            url: '../send_link_name_for_fetch_stats',
            data: {link: '{{$link}}', _token: '{{csrf_token()}}'},
            method: 'POST',
            beforeSend: function () {
                $('#showGifBeforeLoading1').show();

            },
            complete: function () {
                $('#showGifBeforeLoading1').hide();
            },
            success: function (response) {
                if (response !== '1' && response !== '0') {
                    if(response.length<6){
                        $('#show-p-if-days-less').show();
                        $('#show-p-if-days-less').text('Wait for '+(7-response.length)+' days to get clicks statistics ready for {{$link}}');
                        $('.container-fluid').hide();
                    }
                    else {
                        $('.container-fluid').show();
                        $('.fluid-container').show();
                        $('#downlaodstatsasPDF').show();
                        split_data_for_graph(response)
                        set_ips_and_get_stats();
                        set_up_column_graph_for_device_detection();
                        set_countdown();

                    }

                }
                else if(response === '0'){
                    $('#show-p-if-wrong-link').show();
                    $('.container-fluid').hide();
                }
                else {
                    $('#no-clicks').show();
                    $('.container-fluid').hide();
                }
            },
            error: function () {
                $('#Error-message').show();
            }
        });
    }
    function split_data_for_graph(data_for_graph){
        let dates=[];
        let clicks_counts=[];
        for(let i=0;i<data_for_graph.length;i++){
            dates.push(data_for_graph[i][0]);
            clicks_counts.push(data_for_graph[i][1]);
        }
        load_graph_for_daily_clicks(dates,clicks_counts);
       // drwaChartJs1stGraph(dates,clicks_counts);
    }

    function set_ips_and_get_stats() {
        $.ajax({
            url:'../send_link_name_to_set_date_ip',
            data:{link: '{{$link}}', _token: '{{csrf_token()}}'},
            method: 'POST',
            beforeSend:function () {
                $('.showGifBeforeLoading2').show()
            },
            complete:function () {
                $('.showGifBeforeLoading2').hide()
            },
            success:function (response) {
                if (response !== '1' && response !== '0') {
                    split_data_for_bar_graph(response);
                    setUp_pie_graph_forContinents();
                }

                // alert(response);
                //  set_up_bar_graph(response);
            },
            error:function () {

            }

        })
    }

    function set_up_bar_graph(countries,clickCounts) {
        var dataPoints_forCountries=[];
        var chart = new CanvasJS.Chart("countryBarGraph", {
            animationEnabled: true,

            title:{
                text:""
            },
            axisX:{
                interval: 1
            },
            axisY2:{
                interlacedColor: "rgba(1,77,101,.2)",
                gridColor: "rgba(1,77,101,.1)",
                title: "Number of Clicks"
            },
            data: [{
                type: "bar",
                name: "companies",
                axisYType: "secondary",
                color: "#014D65",
                dataPoints: dataPoints_forCountries
                //[
                // { y: 3, label: "Sweden" },
                // { y: 7, label: "Taiwan" },

                // ]
            }]
        });
        for(let j=0;j<countries.length;j++){
            dataPoints_forCountries.push({
                y:clickCounts[j],label:countries[j]
            });
        }
        chart.render();

    }
    function split_data_for_bar_graph(data_for_graph){
        let countries=[];
        let clicks_counts2=[];
        for(let i=0;i<data_for_graph.length;i++){
            countries.push(data_for_graph[i][0]);
            clicks_counts2.push(data_for_graph[i][1]);
        }
        set_up_bar_graph(countries,clicks_counts2);
        // drawBarGraphWithChartJsLib(countries,clicks_counts2);
    }

    function setUp_pie_graph_forContinents() {
        $.ajax({
            url:'../send_link_name_to_set_date_ip',
            data:{link: '{{$link}}',requestCode:'1', _token: '{{csrf_token()}}'},
            method: 'POST',
            beforeSend:function () {
                //  $('.showGifBeforeLoading2').show()
            },
            complete:function () {
                //  $('.showGifBeforeLoading2').hide()
            },
            success:function (response) {
                if (response !== '1' && response !== '0') {
                    split_data_for_pie_graph(response);
                    //alert(response);
                    $('.textDataForPieGraph').show();
                    set_up_world_map();

                }

                // alert(response);
                //  set_up_bar_graph(response);
            },
            error:function () {

            }

        })
    }
    function split_data_for_pie_graph(data_for_graph){
        let continents=[];
        let clicks_counts3=[];
        for(let i=0;i<data_for_graph.length;i++){
            continents.push(data_for_graph[i][0]);
            clicks_counts3.push(data_for_graph[i][1]);
        }
        click_new=set_up_values_in_percentage(clicks_counts3);
        drawPieGraph(continents,click_new);
    }
    function drawPieGraph(continents,clicks_counts3) {
        let continent_array=[];
        var chart = new CanvasJS.Chart("chartContainerforpie", {
            theme: "light2",
            animationEnabled: true,
            title: {
                text: ""
            },
            subtitles: [{
                text: "",
                fontSize: 16
            }],
            data: [{
                type: "pie",
                indexLabelFontSize: 18,
                radius: 80,
                indexLabel: "{label} - {y}",
                yValueFormatString: "###0.0\"%\"",
                click: explodePie,
                dataPoints:continent_array
                //[
                // { y: 42, label: "Gas" },
                // { y: 21, label: "Nuclear"},
                // { y: 24.5, label: "Renewable" },
                // { y: 9, label: "Coal" },
                // { y: 3.1, label: "Other Fuels" }
                // ]
            }]
        });
        for(let j=0;j<continents.length;j++){
            continent_array.push({
                y:clicks_counts3[j],label:continents[j]
            });
        }
        chart.render();

        function explodePie(e) {
            for(var i = 0; i < e.dataSeries.dataPoints.length; i++) {
                if(i !== e.dataPointIndex)
                    e.dataSeries.dataPoints[i].exploded = false;
            }
        }

    }

    function set_up_values_in_percentage(data) {
        let sum=0
        for(var i=0;i<data.length;i++){
            sum=data[i]+sum;
        }
        let new_click_array_of_percent=[];
        for (var j=0;j<data.length;j++){
            new_click_array_of_percent.push((data[j]/sum)*100);
        }
        return new_click_array_of_percent;
    }

    function set_up_column_graph_for_device_detection() {
        $.ajax({
            url:'../send_link_name_to_set_device_detection',
            data:{link: '{{$link}}', _token: '{{csrf_token()}}'},
            method: 'POST',
            beforeSend:function () {
                //  $('.showGifBeforeLoading2').show()
            },
            complete:function () {
                //  $('.showGifBeforeLoading2').hide()
            },
            success:function (response) {
                if (response !== '1' && response !== '0') {
                    //  split_data_for_pie_graph(response);
                    // alert(response);
                    //alert(response);
                    render_column_graph(response)
                    $('.dataTextForcolumnCharts').show();
                }

                // alert(response);
                //  set_up_bar_graph(response);
            },
            error:function () {

            }

        })
    }
    function render_column_graph(pp) {
        let column_array=[];
        var chart = new CanvasJS.Chart("chartContainerForColumnGraph", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title:{
                text: ""
            },
            axisY: {
                title: "Number of Clicks"
            },
            data: [{
                type: "column",
                showInLegend: true,
                legendMarkerColor: "grey",
                legendText: "Desktop vs Mobile",
                dataPoints: column_array
                //[
                // { y: 300878, label: "Venezuela" },
                // { y: 266455,  label: "Saudi" },
                // { y: 169709,  label: "Canada" },
                // { y: 158400,  label: "Iran" },
                // { y: 142503,  label: "Iraq" },
                // { y: 101500, label: "Kuwait" },
                // { y: 97800,  label: "UAE" },
                // { y: 80000,  label: "Russia" }
                //]
            }]
        });
        column_array.push({
            y:pp[0],label:'Mobile'
        });
        column_array.push({
            y:pp[1],label:'Desktop'
        });

        chart.render();


    }
    function set_up_world_map() {
        $.ajax({
            url:'../set_up_world_map',
            data:{link: '{{$link}}', _token: '{{csrf_token()}}'},
            method: 'POST',
            beforeSend:function () {
                $('#showGifBeforeLoading3').show()
            },
            complete:function () {
                $('#showGifBeforeLoading3').hide()
            },
            success:function (response) {
                if (response !== '1' && response !== '0') {
                    set_up_world_map_after_data_fetch(response);
                }

            },
            error:function () {
                alert('error')
            }

        })
    }
    // set_up_world_map();

    // country_array_push_stack['LA']=(
    //    {person: 155, male: 159, female: 151}
    // );
    function set_up_world_map_after_data_fetch(data) {
        //let modified_world_map_array=[];

        for(let i=0;i<data.length;i++) {
            let country_name=data[i][0];
            // alert(country_name)
            let clicks=data[i][1];
            let mobile_dev=data[i][2];
            let pc_dev=data[i][3];

            for (var key in svgMapCountryNamesEN) {
                if (svgMapCountryNamesEN[key] == country_name)
                    country_name=key;
            }
            //  alert(country_name);

            country_array_push_stack[country_name]=(
                {person: clicks, male: mobile_dev, female: pc_dev}
            );
            // alert(country_name)
        }
        new svgMap({
            targetElementID: 'svgMapPersonHeight',
            countryNames: svgMapCountryNamesEN,
            data: svgMapDataPersonHeight,
            colorMin: '#acc1e8',
            colorMax: '#3ec75e',
            hideFlag: false,
            noDataText: 'no clicks'
        });

    }

    // function drwaChartJs1stGraph(dates,clicks) {
    //     var dpss = [];
    //     //Chart.defaults.global.defaultFontStyle = 'Lato'
    //
    //     for(let j=0;j<dates.length;j++) {
    //         let new_date=dates[j].split('-');
    //         let year=new_date[0];
    //         let month=new_date[1];
    //         let day=new_date[2];
    //         dpss.push({
    //             x: new Date(year, (month-1), day), y: clicks[j]
    //         });
    //     }
    //     let ctx = document.getElementById('myChart').getContext('2d');
    //     var myChart = new Chart(ctx, {
    //         type: 'line',
    //         options: {
    //             scales: {
    //                 xAxes: [{
    //                     type: 'time',
    //                     time: {
    //                         displayFormats: {
    //                             hour: "MMM DD , YYYY"
    //                         },
    //                         tooltipFormat: "MMM D"
    //                     },
    //                     distribution: 'linear',
    //                     ticks: {
    //                         autoSkip: true,
    //                         maxTicksLimit: 10
    //                     },
    //
    //                 }],
    //                 yAxes: [{
    //                     ticks: {
    //                         beginAtZero: true
    //                     }
    //                 }]
    //             }
    //         },
    //         data: {
    //             datasets: [{
    //                 fill: false,
    //                 data: dpss,
    //                 label: 'Clicks Per Day',
    //                 borderWidth: 2,
    //                 borderColor:"rgb(75, 192, 192)","lineTension":0.1
    //             }]
    //         }
    //     });
    //
    //
    // }

    // function drawBarGraphWithChartJsLib(countries,clickCounts) {
    //     let ctx1=document.getElementById('myChart2').getContext('2d');
    //     // alert(countries);
    //     let dataPoints_forCountrie=[];
    //     for(let j=0;j<countries.length;j++){
    //         dataPoints_forCountrie.push({
    //             x:clickCounts[j],y:countries[j]
    //         });
    //         // alert(countries[j])
    //     }
    //     var myCharts = new Chart(ctx1, {
    //         type: 'bar',
    //         options: {
    //
    //         },
    //         data: {
    //
    //             datasets: [{
    //                 // label:'clicks',
    //                 // barPercentage: 0.5,
    //                 // barThickness: 6,
    //                 // maxBarThickness: 8,
    //                 // minBarLength: 2,
    //                 // data:dataPoints_forCountrie
    //                 fill: false,
    //                 data: dataPoints_forCountrie,
    //                 label: 'Clicks Per Day',
    //                 borderWidth: 2,
    //                 borderColor:"rgb(75, 192, 192)","lineTension":0.1
    //             }]
    //
    //         }
    //     });
    //
    // }

</script>
<script type="text/javascript" src="{{asset('public/js/canvasjs.min.js') }}"></script>

