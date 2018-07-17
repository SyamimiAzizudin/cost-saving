<div class="text-center">
    <div class="table-container">
        <div class="col-md-2 col-xs-12 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Yearly Target</h5>
            </div>
            <div class="panel-body text-center">
                <h3>{{ number_format( ($yearly_target/1000000), 2, '.', ',' ) }} m</h3>
            </div>
        </div>
        <div class="col-md-3 col-xs-12 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Target Savings (Cumm) </h5>
            </div>
            <div class="panel-body text-center">
                <h3>{{ number_format( ($cummulative_target), 2, '.', ',' ) }} </h3>
            </div>
        </div>
        <div class="col-md-3 col-xs-12 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Actual Savings (Cumm) </h5>
            </div>
            <div class="panel-body text-center">
                <h3> {{ number_format( ($cummulative_actual), 2, '.', ',' ) }} </h3>
            </div>
        </div>
        <div class="col-md-2 col-xs-12 panel panel-default margin-left-table">
            <div class="panel-heading text-center">
                <h5>Yearly % (Cumm) </h5>
            </div>
            <div class="panel-body text-center">
                <h3> {{ number_format(( ($cummulative_actual/$yearly_target) * 100),0) }} % </h3>
            </div>
        </div>
        <div class="col-md-2 col-xs-12 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Month % (Cumm) </h5>
            </div>
            <div class="panel-body text-center">
                <h3> {{ number_format(($cummulative_actual/$cummulative_target) * 100,0) }} % </h3>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- Update Date-->
            <div class="col-lg-12">
                <p class="text-right">Last Update Savings: {{ Carbon\Carbon::parse($last_update)->format('g:i A, d F Y') }}</p>
            </div>
            
    <!-- Chart Section -->
    <div class="row">
        <div class="col-lg-12">
            <center>

            <div id="app">
                <highcharts :options="options" ref="highcharts"></highcharts>
            </div>

            </center>
        </div>
    </div>

    <!--Summary-->
    <div class="row">
        <div class="col-md-12 padding2">
            <div class="col-md-12">
                <h3 class="page-header">Cost Saving Summary - {{ $company->name }}</h3>

                <div class="form-group col-md-6">
                    <label for="month" class="col-sm-3 control-label">Month</label>
                    <div class="col-sm-6">
                        <select name="month" class="form-control" id="company_filtermonth">
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-12 padding2">
                <div class="form-group">
                    <div id="company_saving_summary_month"></div>
                </div>
            </div>
        </div>
    {{-- </div>    --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="text-right padding2">
                <a href="{{ url('/print-overall') }}" class="btn btn-outline-success success print-ipad">Print Overall Page</a>
            </div>
        </div>
    </div>

<script>

    //initial load
    getTable(2018, 1);
    $(function() {
        $("#company_filtermonth").on('change', function(){
            var value = $(this).find(":selected").val();
            var curr_year = $("#company_filteryear option:selected").val();
            getTable(curr_year, value);
        });
    });

    function getTable(year, month)
    {
        $.ajax({
            url: '/company_dashboard_cost_saving_summary/{{ $id }}/'+year+'/'+month, //this is the submit URL
            type: 'GET', //or POST
            success: function(data){
                $("#company_saving_summary_month").html(data);
            }
        });
    }

    Vue.use(VueHighcharts);

    var options = {
        title: {
            text: '',
            x: -20 //center
        },
        xAxis: {
            title: {
                text: 'Month'
            },
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Savings (RM)',
                position: "top"
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ''
        },
        legend: {
            // layout: 'vertical',
            // align: 'right',
            // verticalAlign: 'middle',
            // borderWidth: 0
            position: "bottom"
        },
        series: [{
            name: 'Target Savings (RM)',
            data: <?php echo json_encode($graphs['targets']); ?>
        }, {
            name: 'Actual Savings (RM)',
            data: <?php echo json_encode($graphs['actual']); ?>
        }, {
            name: 'Yearly Target (RM)',
            data: <?php echo json_encode($graphs['yearly_target']); ?>
        }]
    };

    var vm = new Vue({
        el: '#app',
        data: {
            options: options
        },
        methods: {
            updateCredits: function() {
                var chart = this.$refs.highcharts.chart;
                chart.credits.update({
                    style: {
                        color: '#' + (Math.random() * 0xffffff | 0).toString(16)
                    }
                });
            }
        }
    });

</script>