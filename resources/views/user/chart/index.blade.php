@extends('user.master')

@section('main-content')
    <section class="content-header">
        <h1>
            نمودار بررسی
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
            <li><a href="#">نمودارها</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- interactive chart -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-bar-chart-o"></i>

                        <h3 class="box-title">منطقه ای</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div id="highcharts" style="height: 500px;"></div>
                    </div>
                    <!-- /.box-body-->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
@section('script')
    {{--<script src="https://code.highcharts.com/highcharts.js"></script>--}}
    {{--<script src="https://code.highcharts.com/modules/series-label.js"></script>--}}
    {{--<script src="https://code.highcharts.com/modules/exporting.js"></script>--}}
    {{--<script src="https://code.highcharts.com/modules/export-data.js"></script>--}}
    {{--<script src="https://code.highcharts.com/modules/accessibility.js"></script>--}}
    <script src="{{ asset('js/highcharts.js') }}"></script>

    {{--<script>--}}
    {{--Highcharts.chart('highcharts', {--}}

    {{--title: {--}}
    {{--text: 'Solar Employment Growth by Sector, 2010-2016'--}}
    {{--},--}}

    {{--subtitle: {--}}
    {{--text: 'Source: thesolarfoundation.com'--}}
    {{--},--}}

    {{--yAxis: {--}}
    {{--title: {--}}
    {{--text: 'Number of Employees'--}}
    {{--}--}}
    {{--},--}}

    {{--xAxis: {--}}
    {{--accessibility: {--}}
    {{--rangeDescription: 'Range: 2010 to 2017'--}}
    {{--}--}}
    {{--},--}}

    {{--legend: {--}}
    {{--layout: 'vertical',--}}
    {{--align: 'right',--}}
    {{--verticalAlign: 'middle'--}}
    {{--},--}}

    {{--plotOptions: {--}}
    {{--series: {--}}
    {{--label: {--}}
    {{--connectorAllowed: false--}}
    {{--},--}}
    {{--pointStart: 2010--}}
    {{--}--}}
    {{--},--}}

    {{--series: [{--}}
    {{--name: 'Installation',--}}
    {{--data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]--}}
    {{--}, {--}}
    {{--name: 'Manufacturing',--}}
    {{--data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]--}}
    {{--}, {--}}
    {{--name: 'Sales & Distribution',--}}
    {{--data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]--}}
    {{--}, {--}}
    {{--name: 'Project Development',--}}
    {{--data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]--}}
    {{--}, {--}}
    {{--name: 'Other',--}}
    {{--data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]--}}
    {{--}],--}}

    {{--responsive: {--}}
    {{--rules: [{--}}
    {{--condition: {--}}
    {{--maxWidth: 500--}}
    {{--},--}}
    {{--chartOptions: {--}}
    {{--legend: {--}}
    {{--layout: 'horizontal',--}}
    {{--align: 'center',--}}
    {{--verticalAlign: 'bottom'--}}
    {{--}--}}
    {{--}--}}
    {{--}]--}}
    {{--}--}}

    {{--});--}}
    {{--</script>--}}
@endsection