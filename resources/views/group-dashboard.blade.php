@extends('layouts.app')

@section('content')
        
        
        <div class="row">
            <div class="col-lg-12">
                <!--name group-->
                <h1 class="page-header">M&E Group Dashboard</h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    <li><a href="{{ url('/dashboard') }}">Main Dashboard</a>
                    </li>
                    <li class="active">M&E Group Dashboard</li>
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
                            <h4>RM 18 m</h4>    
                        </div>
                    </div>
                    <div class="col-md-3 panel panel-default">
                        <div class="panel-heading text-center">
                            <h5>Target Savings (Cumm.) </h5>
                        </div>
                        <div class="panel-body text-center">
                            <h4>RM 8,525,785.00</h4>    
                        </div>
                    </div>
                    <div class="col-md-3 panel panel-default">
                        <div class="panel-heading text-center">
                            <h5>Actual Savings (Cumm.) </h5>
                        </div>
                        <div class="panel-body text-center">
                            <h4>RM 1,525,785.00</h4>    
                        </div>
                    </div>
                    <div class="col-md-2 panel panel-default">
                        <div class="panel-heading text-center">
                            <h5>Yearly % (Cumm.) </h5>
                        </div>
                        <div class="panel-body text-center">
                            <h4>75% </h4>    
                        </div>
                    </div>
                    <div class="col-md-2 panel panel-default">
                        <div class="panel-heading text-center">
                            <h5>Monthly % (Cumm.) </h5>
                        </div>
                        <div class="panel-body text-center">
                            <h4>34% </h4>    
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
                    <h3 class="page-header">Cost Saving Summary - Group</h3>

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

                <div class="col-md-offset-1 col-md-12 padding2">
                    <div class="form-group">
                        <label for="company" class="col-md-2 control-label">Company</label>
                        <label for="company" class="col-md-2 control-label">Target (RM)</label>
                        <label for="company" class="col-md-2 control-label">Actual (RM)</label>
                        <label for="company" class="col-md-2 control-label"> <center>%</center> </label>
                    </div>
                    <div class="form-group padding2">
                        <label for="company" class="col-md-2 control-label">UMW Equipment Sdn Bhd</label>
                        <input class="col-md-2 text-center good" type="integer" value ="12,084.00">
                        <input class="col-md-2 text-center good" type="integer" value ="12,084.00" readonly>
                        <input class="col-md-2 text-center" type="integer" value ="12,084.00" readonly>
                        <a href="{{ url('/company-dashboard') }}" class="">View More</a>
                    </div>
                    <div class="form-group padding2">
                        <label for="company" class="col-md-2 control-label">UMW (East Malaysia) Sdn Bhd</label>
                        <input class="col-md-2 text-center good" type="integer" value ="12,084.00">
                        <input class="col-md-2 text-center fail" type="integer" value ="12,084.00" readonly>
                        <input class="col-md-2 text-center" type="integer" value ="12,084.00" readonly>
                        <a href="{{ url('/company-dashboard') }}" class="">View More</a>
                    </div>
                    <div class="form-group padding2">
                        <label for="company" class="col-md-2 control-label">UMW Industries (1985) Sdn Bhd</label>
                        <input class="col-md-2 text-center good" type="integer" value ="12,084.00">
                        <input class="col-md-2 text-center fail" type="integer" value ="12,084.00" readonly>
                        <input class="col-md-2 text-center" type="integer" value ="12,084.00" readonly>
                        <a href="{{ url('/company-dashboard') }}" class="">View More</a>
                    </div>
                    <div class="form-group padding2">
                        <label for="company" class="col-md-2 control-label">UMW Industrial Power Services Sdn Bhd</label>
                        <input class="col-md-2 text-center good" type="integer" value ="12,084.00">
                        <input class="col-md-2 text-center fail" type="integer" value ="12,084.00" readonly>
                        <input class="col-md-2 text-center" type="integer" value ="12,084.00" readonly>
                        <a href="{{ url('/company-dashboard') }}" class="">View More</a>
                    </div>
                    <div class="form-group padding2">
                        <label for="company" class="col-md-2 control-label">UMW Equipment & Engineering PTE LTD</label>
                        <input class="col-md-2 text-center good" type="integer" value ="12,084.00">
                        <input class="col-md-2 text-center fail" type="integer" value ="12,084.00" readonly>
                        <input class="col-md-2 text-center" type="integer" value ="12,084.00" readonly>
                        <a href="{{ url('/company-dashboard') }}" class="">View More</a>
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
              text: 'Cost (RM K)'
            },
            plotLines: [{
              value: 0,
              width: 1,
              color: '#808080'
            }]
          },
          tooltip: {
            valueSuffix: 'K'
          },
          legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
          },
          series: [{
            name: 'Target Cost Saving ',
            data: [50, 110, 180, 250, 320, 380, 450, 520, 590, 660, 730, 800]
          }, {
            name: 'Current Cost Saving',
            data: [50, 80, 150, 130, 230, 340]
          }, {
            name: 'Yearly',
            data: [800, 800, 800, 800, 800, 800, 800, 800, 800, 800, 800, 800]
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