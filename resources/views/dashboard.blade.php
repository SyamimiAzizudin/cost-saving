@extends('layouts.app')

@section('content')

<!-- Dashboard All Section -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Main Dashboard </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li class="active">Main Dashboard</li>
        </ol>
    </div>

    <div class="col-md-12  form-group">
        <div class="col-md-2 panel panel-default">
            <div class="panel-heading text-center">
                 <h5>Yearly Target</h5>
            </div>
            <div class="panel-body text-center">
                <h3>RM {{ $yearly_target }}</h3>
            </div>
        </div>

        <div class="col-md-3 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Target Savings (Cumm) </h5>
            </div>
            <div class="panel-body text-center">
                <h3>RM {{ $cummulative_target }}</h3>
            </div>
        </div>
            
        <div class="col-md-3 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Actual Savings (Cumm) </h5>
            </div>
            <div class="panel-body text-center">
                <h3>RM {{ $cummulative_actual }}</h3>
            </div>
        </div>
                
        <div class="col-md-2 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Yearly % (Cumm) </h5>
            </div>
            <div class="panel-body text-center">
                <h3>{{ number_format(( ($cummulative_actual/$yearly_target) * 100),0) }} %</h3>
            </div>
        </div>
                
        <div class="col-md-2 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Monthly % (Cumm)</h5>
            </div>
            <div class="panel-body text-center">
                <h3>{{ number_format(($cummulative_actual/$cummulative_target) * 100,0) }} %</h3>
            </div>
        </div>
    </div>
        
    <!-- Update Date-->
    <div class="col-lg-12">
        <p class="text-right">Latest Date Update : 12 June 2018</p>
    </div>
</div>

<!-- Dashboard Section -->
<div class="row">
    <div class="col-lg-12">
        <center>
            
            <div id="app">
                <highcharts :options="options" ref="highcharts"></highcharts>
            </div>

            <br>

            <div class="col-md-8 col-md-offset-2">
                <?php $i=0 ?>
                @forelse ($companies as $company)
                <div class="col-md-4">
                    <a href="{{ url('/group-dashboard') }}/{{$company->group}}" type="button" class="btn btn-lg btn-primary custom1">Dashboard {{$company->group}}</a>
                </div>
                <?php $i++; ?>
                @empty
                @endforelse
            </div>

        </center>
    </div>
</div>
        
<!--Summary-->
<div class="row">
    <div class="col-md-12 padding2">
        <div class="col-md-12">
            <h3 class="page-header">Cost Saving Summary - Group</h3>

            <div class="form-group">
                <label for="month" class="col-sm-2 control-label">Month</label>
                <div class="col-sm-6">
                    <select name="month" class="form-control" id="usercompany" required>
                        <option value="January" >January</option>
                        <option value="February" >February</option>
                        <option value="March" >March</option>
                        <option value="May" >May</option>
                        <option value="June" >June</option>
                        <option value="July" >July</option>
                        <option value="August" >August</option>
                        <option value="September" >September</option>
                        <option value="October" >October</option>
                        <option value="November" >November</option>
                        <option value="December" >December</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-12 padding2">
            <div class="form-group">
                <label for="company" class="col-md-3 control-label">Group</label>
                <label for="company" class="col-md-2 text-center control-label">Target (RM)</label>
                <label for="company" class="col-md-2 text-center control-label">Actual (RM)</label>
                <label for="company" class="col-md-1 text-center control-label">%</label>
            </div>
            <!-- <div class="form-group padding2">
                <label for="company" class="col-md-2 control-label">M&E</label>
                <input class="col-md-2 text-center number good" type="integer" value ="12,084.00">
                <input class="col-md-2 text-center number good" type="integer" value ="12,084.00" readonly>
                <input class="col-md-2 text-center number" type="integer" value ="100" readonly>
                <a href="{{ url('/group-dashboard') }}" class="marginRight">View More (Group)</a>
            </div> -->
            <div class="form-group padding2">
                <?php $i=0 ?>
                @forelse ($saving_summary_results as $k => $v)
                <div class="form-group padding2">
                    <label for="company" class="col-md-3 control-label">{{  $v->group }}</label>
                    <label for="saving_target" class="col-md-2 number text-center control-label">{{  $v->target }}</label>
                    <label for="actual_saving" class="col-md-2 number text-center control-label">{{  $v->actual }}</label>
                    <label for="Target" class="col-md-1 text-center control-label">45</label>
                    <label class="col-md-2 text-left"><a href="{{ url('/group-dashboard') }}/{{$company->group}}">View More (Company)</a></label>
                </div>
                <?php $i++; ?>
                @empty
                @endforelse
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="text-right padding2">
                <a href="{{ url('/print-overall') }}" class="btn btn-outline-success success">Print Overall Page</a>
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
              text: 'Saving (RM)'
            },
            plotLines: [{
              value: 0,
              width: 1,
              color: '#808080'
            }]
          },
          tooltip: {
            valueSuffix: 'm'
          },
          legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
          },
          series: [{
            name: 'Target Savings (RM)',
            data: <?php echo json_encode($graphs['targets']) ?>
          }, {
            name: 'Actual Savings (RM)',
            data: <?php echo json_encode($graphs['actual']) ?>
          }, {
            name: 'Yearly Target (RM)',
            data: <?php echo json_encode($graphs['yearly_target']) ?>
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