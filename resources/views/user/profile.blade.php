@include('layout.profileHead')@include('layout.profileSidebar')
<div class="wrapper">
    <div class="main-panel" id="main-panel">
        @include('layout.profileHeader')
        <div class="content"  style="overflow:auto;height: 80vh;">
{{----------------------------------------Weekly CLICKS STATS-----------------------------------------------}}
           @php
           // $data_for_week_stats=\App\Http\Controllers\link::get_data_for_allover_stats_for_clicks('week');
          //$date_explode=explode('-',date('Y-m-d'));
               // print_r($data_for_week_stats);
           @endphp
            <script>
                window.onload = function () {

                    var chart = new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true,
                        theme: "light2",
                        title:{
                            text: "Site Traffic"
                        },
                        axisX:{
                            valueFormatString: "DD MMM, YYYY",
                            crosshair: {
                                enabled: true,
                                snapToDataPoint: true
                            }
                        },
                        axisY: {
                            title: "Number of Visits",
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
                            name: "Total Visit",
                            markerType: "square",
                            xValueFormatString: "DD MMM, YYYY",
                            color: "#F08080",
                            dataPoints: [

                                { x: new Date(2017, 0, 3), y: 650 },
                                { x: new Date(2017, 0, 4), y: 700 },
                                { x: new Date(2017, 0, 5), y: 710 },
                                { x: new Date(2017, 0, 6), y: 658 },
                                { x: new Date(2017, 0, 7), y: 734 },
                                { x: new Date(2017, 0, 8), y: 963 },
                                { x: new Date(2017, 0, 9), y: 847 },
                                { x: new Date(2017, 0, 10), y: 853 },
                                { x: new Date(2017, 0, 11), y: 869 },
                                { x: new Date(2017, 0, 12), y: 943 },
                                { x: new Date(2017, 0, 13), y: 970 },
                                { x: new Date(2017, 0, 14), y: 869 },
                                { x: new Date(2017, 0, 15), y: 890 },
                                { x: new Date(2017, 0, 16), y: 930 }

                            ]
                        },

                    ]
                    });
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

            <div id="chartContainer" style="height: 300px; width: 100%;"></div>

{{----------------------------------------Monthly CLICKS STATS-----------------------------------------------}}


{{----------------------------------------Yearly CLICKS STATS-----------------------------------------------}}

{{--            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>--}}
            <script type="text/javascript" src="{{asset('public/js/canvasjs.min.js') }}"></script>
        </div>

    </div>
</div>

@yield('scripts')
