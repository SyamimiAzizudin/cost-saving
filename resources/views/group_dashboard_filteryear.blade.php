<div class="text-center">
    <div class="table-container">
        <div class="col-md-2 col-xs-12 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Yearly Target </h5>
            </div>
            <div class="panel-body text-center">
                <h3>RM {{ number_format( ($yearly_target/1000000), 1, '.', ',' ) }} m</h3>
            </div>
        </div>
        <div class="col-md-3 col-xs-12 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Target Savings (Cumm) </h5>
            </div>
            <div class="panel-body text-center">
                <h3>RM {{ number_format( ($cummulative_target), 2, '.', ',' ) }} </h3>
            </div>
        </div>
        <div class="col-md-3 col-xs-12 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Actual Savings (Cumm) </h5>
            </div>
            <div class="panel-body text-center">
                <h3>RM {{ number_format( ($cummulative_actual), 2, '.', ',' ) }} </h3>
            </div>
        </div>
        <div class="col-md-2 col-xs-12 panel panel-default margin-left-table">
            <div class="panel-heading text-center">
                <h5>Yearly % (Cumm) </h5>
            </div>
            <div class="panel-body text-center">
                @if($yearly_target != '0')
                    <h3>{{ number_format(( ($cummulative_actual/$yearly_target) * 100),0) }} % </h3>
                @else
                    <h3>0</h3>
                @endif
            </div>
        </div>
        <div class="col-md-2 col-xs-12 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Monthly % (Cumm) </h5>
            </div>
            <div class="panel-body text-center">
                @if($cummulative_target != '0')
                    <h3>{{ number_format(($cummulative_actual/$cummulative_target) * 100,0) }} % </h3>
                @else
                    <h3>0</h3>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- Get Group Latest Date -->
            <div class="col-lg-12">
                <p class="text-right">Last Update Savings: {{ Carbon\Carbon::parse($last_update)->format('g:i A, d F Y') }}</p>
            </div>

    <!-- Group Chart Section -->
    <div class="row">
        <div class="col-lg-12"> 
            <center>

            <div id="group_app">
                <highcharts :options="options" ref="highcharts"></highcharts>
            </div>

            </center>
        </div>
    </div>

    <!-- Group Summary -->
    <div class="row">
        <div class="col-md-12 padding2">
            <div class="col-md-12">
                <h3 class="page-header">Cost Saving Summary - {{ $group }} Group</h3>

                <div class="form-group col-md-6">
                    <label for="month" class="col-sm-3 control-label">Month</label>
                    <div class="col-sm-6">
                        <select name="month" class="form-control" id="group_filtermonth">
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
                    <div id="group_saving_summary_month"></div>
                </div>
            </div>
        </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="text-right padding2">
                <button onclick="myPrint()" class="btn btn-outline-success success print-ipad">Print PDF</button>
            </div>
        </div>
    </div>

<script>

    //pass value to js
    var year = <?php echo json_encode($year); ?>;

    //initial load
    getTable(year, 1);
    $(function() {
        $("#group_filtermonth").on('change', function(){
            var value = $(this).find(":selected").val();
            var curr_year = <?php echo json_encode($year); ?>;
            // var curr_year = $("#group_filteryear").find(":selected").val();
            getTable(curr_year, value);
        });
    });

    function getTable(year, month)
    {
        $.ajax({
            url: '/group_dashboard_cost_saving_summary/{{ $group }}/'+year+'/'+month, //this is the submit URL
            type: 'GET', //or POST
            success: function(data){
                $("#group_saving_summary_month").html(data);
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
            position: 'bottom'
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
        el: '#group_app',
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