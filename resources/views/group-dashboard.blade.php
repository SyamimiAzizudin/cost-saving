@extends('layouts.app')

@section('content')
        
        
        <div class="row">
            <div class="col-lg-12">
                <!--name group-->
                <h1 class="page-header">Dashboard - Equipment Group</h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    <li><a href="{{ url('/dashboard') }}">Main Dashboard</a>
                    </li>
                    <li class="active">Dashboard - Equipment Group</li>
                </ol>
                <div class="col-md-3" style="display: none">
                    <h4>Company :</h4>
                    <br>
                    <div class="list-group">
                        <a href="{{ url('/company-dashboard') }}" class="list-group-item active">UMW Equipment Sdn Bhd</a>
                        <a href="{{ url('/company-dashboard') }}" class="list-group-item">UMW (East Malaysia) Sdn Bhd</a>
                        <a href="{{ url('/company-dashboard') }}" class="list-group-item">UMW Industries (1985) Sdn Bhd</a>
                        <a href="{{ url('/company-dashboard') }}" class="list-group-item">UMW Industrial Power Services Sdn Bhd</a>
                        <a href="{{ url('/company-dashboard') }}" class="list-group-item">UMW Equipment & Engineering PTE LTD</a>

                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <div class="col-md-2 panel panel-default">
                        <div class="panel-heading text-center">
                            <h5>Yearly Target </h5>
                        </div>
                        <div class="panel-body text-center">
                            <h3>RM 18 m</h3>    
                        </div>
                    </div>
                    <div class="col-md-3 panel panel-default">
                        <div class="panel-heading text-center">
                            <h5>Target Savings (Cumm) </h5>
                        </div>
                        <div class="panel-body text-center">
                            <h3>RM 8,525,785.00</h3>    
                        </div>
                    </div>
                    <div class="col-md-3 panel panel-default">
                        <div class="panel-heading text-center">
                            <h5>Actual Savings (Cumm) </h5>
                        </div>
                        <div class="panel-body text-center">
                            <h3>RM 9,525,785.00</h3>    
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
                            <h5>Monthly % (Cumm) </h5>
                        </div>
                        <div class="panel-body text-center">
                            <h3>34 </h3>    
                        </div>
                    </div>
                    <p class="text-right ">Latest Date Update : 12 September 2018</p>
                </div>

                <div class="col-md-12">
                    <center>

                    <div id="app">
                        <highcharts :options="options" ref="highcharts"></highcharts>
                    </div>
    
                    </center>
                </div>
            </div>
        </div>

        <!--Summary-->
        <div class="row">
            <div class="col-md-12 padding2">
                <div class="col-md-12">
                    <h3 class="page-header">Cost Saving Summary - Equipment Group</h3>

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

                <div class="col-md-12 padding2">
                    <div class="form-group">
                        <table class="table table-bordered" style="border-collapse: collapse;">
                            <tr>
                                <td><label for="" class="col-md-12 text-center control-label">Company</label></td>
                                <td><label for="" class="col-md-12 text-center control-label">Target (RM)</label></td>
                                <td><label for="" class="col-md-12 text-center control-label">Actual (RM)</label></td>
                                <td><label for="" class="col-md-12 text-center control-label">%</label></td>
                                <td></td>
                            </tr>
                            <?php $i=1 ?>
                            @forelse ($companies as $company)
                            <tr>
                                <td><label for="company" class="col-md-12 control-label">{{ $company->name }}</label></td>
                                <td><label for="Target" class="col-md-12 text-center control-label">12,456</label></td>
                                <td><label for="Target" class="col-md-12 text-center control-label">12,456</label></td>
                                <td><label for="Target" class="col-md-12 text-center control-label">45</label></td>
                                <td><a href="{{ url('/company-dashboard') }}/{{ $company->id }}" class="marginRight">View More (Company)</a></td>
                            </tr>
                            <?php $i++; ?>
                            @empty
                            @endforelse
                        </table>
                    </div>
                </div>

            </div>
        <!-- </div> -->

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
            data: [1, 3, 5, 8, 12, 13.5, 15, 16, 17, 17, 17.5, 18]
          }, {
            name: 'Actual Savings (RM)',
            data: [2, 3.5, 5, 7, 8.3, 9.5]
          }, {
            name: 'Yearly Target (RM)',
            data: [18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18]
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