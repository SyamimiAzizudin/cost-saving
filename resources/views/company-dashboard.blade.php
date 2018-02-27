@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard - {{ $company->name }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/dashboard') }}">Main Dashboard</a></li>
            <li><a href="{{ url('/group-dashboard') }}">Group Dashboard</a></li>
            <li class="active">Dashboard - {{ $company->name }}</li>
        </ol>
    </div>

    <div class="col-md-12 form-group">

        <div class="col-md-2 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Yearly Target</h5>
            </div>
            <div class="panel-body text-center">
                <h3>RM 7 m</h3>
            </div>
        </div>
        <div class="col-md-3 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Target Savings (Cumm) </h5>
            </div>
            <div class="panel-body text-center">
                <h3>RM 5,525,785.00</h3>
            </div>
        </div>
        <div class="col-md-3 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Actual Savings (Cumm) </h5>
            </div>
            <div class="panel-body text-center">
                <h3>RM 5,925,785.00</h3>
            </div>
        </div>
        <div class="col-md-2 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Yearly % (Cumm) </h5>
            </div>
            <div class="panel-body text-center">
                <h3>75 </h3>
            </div>
        </div>
        <div class="col-md-2 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Month % (Cumm) </h5>
            </div>
            <div class="panel-body text-center">
                <h3>34 </h3>
            </div>
        </div>
        <p class="text-right">Latest Date Update : 12 September 2018</p>
    </div>
</div><!-- /.row -->

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
            <!--Company Name-->
            <h3 class="page-header">Cost Saving Summary - {{ $company->name }}</h3>

            <div class="form-group col-md-6">
                <label for="month" class="col-sm-3 control-label">Month</label>
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

        <!-- <div class="col-md-offset-1 col-md-12 padding2">
            <div class="form-group">
                <label for="company" class="col-md-2 control-label">Area</label>
                <label for="company" class="col-md-2 text-center control-label">Target (RM)</label>
                <label for="company" class="col-md-2 text-center control-label">Actual (RM)</label>
                <label for="company" class="col-md-2 text-center control-label">%</label>
            </div>
            <div class="form-group padding2">
                <label for="company" class="col-md-2 control-label">Supplier (Komatsu Principal - Equipment)</label>
                <input class="col-md-2 text-center number good" type="integer" name="firstname" value ="12,084.00">
                <input class="col-md-2 text-center number good" type="integer" name="firstname" value ="12,084.00" readonly>
                <input class="col-md-2 text-center number" type="integer" name="firstname" value ="34" readonly>
                <a href="{{ url('/print-overall') }}" class="marginRight">View More</a>
            </div>
            <div class="form-group padding2">
                <label for="company" class="col-md-2 control-label">Supplier (Bomag Principal - Equipment)</label>
                <input class="col-md-2 text-center number good" type="integer" name="firstname" value ="12,084.00">
                <input class="col-md-2 text-center number fail" type="integer" name="firstname" value ="12,084.00" readonly>
                <input class="col-md-2 text-center number" type="integer" name="firstname" value ="34" readonly>
                <a href="{{ url('/print-overall') }}" class="marginRight">View More</a>
            </div>
            <div class="form-group padding2">
                <label for="company" class="col-md-2 control-label">Supplier (Komatsu Principal - Parts)</label>
                <input class="col-md-2 text-center number good" type="integer" name="firstname" value ="12,084.00">
                <input class="col-md-2 text-center number fail" type="integer" name="firstname" value ="12,084.00" readonly>
                <input class="col-md-2 text-center number" type="integer" name="firstname" value ="34" readonly>
                <a href="{{ url('/print-overall') }}" class="marginRight">View More</a>
            </div>
            <div class="form-group padding2">
                <label for="company" class="col-md-2 control-label">Supplier (KUI Principal - parts)</label>
                <input class="col-md-2 text-center number good" type="integer" name="firstname" value ="12,084.00">
                <input class="col-md-2 text-center number fail" type="integer" name="firstname" value ="12,084.00" readonly>
                <input class="col-md-2 text-center number" type="integer" name="firstname" value ="34" readonly>
                <a href="{{ url('/print-overall') }}" class="marginRight">View More</a>
            </div>
        </div> -->

        <div class="col-md-12 padding2">
            <div class="form-group">
                <table class="table table-bordered" style="border-collapse: collapse;">
                    <tr>
                        <td><label for="" class="col-md-12 text-center control-label">Area</label></td>
                        <td><label for="" class="col-md-12 text-center control-label">Target (RM)</label></td>
                        <td><label for="" class="col-md-12 text-center control-label">Actual (RM)</label></td>
                        <td><label for="" class="col-md-12 text-center control-label">%</label></td>
                        {{-- <td></td> --}}
                    </tr>
                    <?php $i=1 ?>
                    @forelse ($init as $w)
                    @if($w->company_id == $company->id)
                    <tr>
                        <td><b><a href="{{ url('/saving-company') }}/{{ $w->company_id }}">{!! $w->area !!}</a></b></td>
                        <td>
                            <label for="target_saving" class="col-md-12 number text-right control-label"></label>
                        </td>
                        @if($w->target_saving > $w->actual_saving)
                        <td><label for="actual_saving" class="col-md-12 number text-right control-label fail">{{ $w->actual_saving }}</label></td>
                        @else
                        <td><label for="actual_saving" class="col-md-12 number text-right control-label good">{{ $w->actual_saving }}</label></td>
                        @endif
                        <td><label for="actual_saving" class="col-md-12 number text-center control-label">45</label></td>
                    </tr>
                    <?php $i++; ?>
                    @endif
                    @empty
                    @endforelse
                </table>
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
        data: [0.5, 1, 2, 2.5, 2.8, 3, 3.7, 4, 5.5, 6, 6.8, 7]
      }, {
        name: 'Actual Savings (RM)',
        data: [0.3, 1, 1.2, 1.6, 2, 2.5, 3.2, 4, 4.2, 4.8, 5.2, 5.9]
      }, {
        name: 'Yearly Target (RM)',
        data: [7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7]
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