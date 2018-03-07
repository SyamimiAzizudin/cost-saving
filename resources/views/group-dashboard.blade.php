@extends('layouts.app')

@section('content')
        
<div class="row">
    <div class="col-lg-12">
        <!--name group-->
        <h1 class="page-header">Dashboard - {{ $group }} Group</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/dashboard') }}">Main Dashboard</a>
            </li>
            <li class="active">Dashboard - {{ $group }} Group</li>
        </ol>
    </div>
    <div class="col-md-12 form-group">
    </div></div></div></div></div>

<div class="text-center">
    <div class="table-container">
        <div class="col-md-2 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Yearly Target </h5>
            </div>
            <div class="panel-body text-center">
                <h3>RM {{ number_format( ($yearly_target/1000000), 1, '.', ',' ) }} m</h3>
            </div>
        </div>
        <div class="col-md-3 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Target Savings (Cumm) </h5>
            </div>
            <div class="panel-body text-center">
                <h3>RM {{ number_format( ($cummulative_target), 2, '.', ',' ) }} </h3>
            </div>
        </div>
        <div class="col-md-3 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Actual Savings (Cumm) </h5>
            </div>
            <div class="panel-body text-center">
                <h3>RM {{ number_format( ($cummulative_actual), 2, '.', ',' ) }} </h3>
            </div>
        </div>
        <div class="col-md-2 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Yearly % (Cumm) </h5>
            </div>
            <div class="panel-body text-center">
                <h3>{{ number_format(( ($cummulative_actual/$yearly_target) * 100),0) }} % </h3>
            </div>
        </div>
        <div class="col-md-2 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Monthly % (Cumm) </h5>
            </div>
            <div class="panel-body text-center">
                <h3>{{ number_format(($cummulative_actual/$cummulative_target) * 100,0) }} % </h3>
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
                <h3 class="page-header">Cost Saving Summary - {{ $group }} Group</h3>

                <div class="form-group col-md-6">
                    <label for="month" class="col-sm-3 control-label">Month</label>
                    <div class="col-sm-6">
                        <select name="month" class="form-control" id="usercompany">
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
                    <div id="saving_summary"></div>
                </div>
            </div>
        </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="text-right padding2">
                <button class="btn btn-outline-success success">Print Overall Page</button>
            </div>
        </div>
    </div>

<!-- Footer -->
<div class="container">
    <hr>
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; UMW Cost Saving Initiative 2018</p>
            </div>
        </div>
    </footer>
</div>

<script>
    //initial load
    getTable(1);
    $(function() {
        $("#usercompany").on('change', function(){
            var selected_value = $(this).find(":selected").val();
            getTable(selected_value);
        });
    });

    function getTable(month)
    {
        $.ajax({
            url: '/group_dashboard_cost_saving_summary/{{ $group }}/'+month, //this is the submit URL
            type: 'GET', //or POST
            success: function(data){
                $("#saving_summary").html(data);
            }
        });
    }
</script>

<script>
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
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
          'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ]
      },
      yAxis: {
        title: {
          text: 'Savings (RM)'
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
        // layout: 'vertical',
        // align: 'right',
        // verticalAlign: 'middle',
        // borderWidth: 0
      },
      series: [{
        <?php ?>
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

@endsection