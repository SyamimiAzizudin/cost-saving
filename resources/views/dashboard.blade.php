@extends('layouts.app')

@section('content')

        <!-- Dashboard All Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Main Dashboard </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}">Home</a>
                    </li>
                    <li class="active">Main Dashboard</li>
                </ol>
            </div>
            <div class="col-md-12  form-group">

                <div class="col-md-2 panel panel-default">
                    <div class="panel-heading text-center">
                        <h5>Yearly Target</h5>
                    </div>
                    <div class="panel-body text-center">
                        <h3>RM 34 M</h3>    
                    </div>
                </div>
                <div class="col-md-3 panel panel-default">
                    <div class="panel-heading text-center">
                        <h5>Target Savings (Cumm) </h5>
                    </div>
                    <div class="panel-body text-center">
                        <h3>RM 15m</h3>    
                    </div>
                </div>
                <div class="col-md-3 panel panel-default">
                    <div class="panel-heading text-center">
                        <h5>Actual Savings (Cumm) </h5>
                    </div>
                    <div class="panel-body text-center">
                        <h3>RM 18m</h3>    
                    </div>
                </div>
                <div class="col-md-2 panel panel-default">
                    <div class="panel-heading text-center">
                        <h5>Yearly % (Cumm) </h5>
                    </div>
                    <div class="panel-body text-center">
                        <h3>52% </h3>    
                    </div>
                </div>
                <div class="col-md-2 panel panel-default">
                    <div class="panel-heading text-center">
                        <h5>Monthly % (Cumm)</h5>
                    </div>
                    <div class="panel-body text-center">
                        <h3>120% </h3>    
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
                    <div class="col-md-4">
                        <a href="{{ url('/group-dashboard') }}" type="button" class="btn btn-lg btn-primary custom">Dashboard Manufacturing & Engineering</a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ url('/group-dashboard') }}" type="button" class="btn btn-lg btn-primary custom1">Dashboard Equipments</a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ url('/group-dashboard') }}" type="button" class="btn btn-lg btn-primary custom1">Dashboard Corporate</a>
                    </div>
                </div>

            </center>
            </div>
        </div>
        
        <!--Summary-->
        <div class="row">
            <div class="col-lg-12 padding2">

                <div class="col-md-8 col-md-offset-2">
                    <h3 class="page-header">Group</h3>

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
            
            <div class="col-md-offset-2 col-md-10 padding2">
                    <div class="form-group">
                        <label for="company" class="col-md-2 text-right control-label"></label>
                        <label for="company" class="col-md-2 control-label">Target (RM)</label>
                        <label for="company" class="col-md-2 control-label">Actual (RM)</label>
                        <label for="company" class="col-md-2 control-label"> <center>%</center> </label>
                    </div>
                    <div class="form-group padding2">
                        <label for="company" class="col-md-2 text-right control-label">M&E</label>
                        <input class="col-md-2 text-center number good" type="integer" value ="12,084.00">
                        <input class="col-md-2 text-center number good" type="integer" value ="12,084.00" readonly>
                        <input class="col-md-2 text-center number" type="integer" value ="100" readonly>
                        <a href="{{ url('/group-dashboard') }}" class="marginRight">View More (Group)</a>
                    </div>
                    <div class="form-group padding2">
                        <label for="company" class="col-md-2 text-right control-label">Equipment</label>
                        <input class="col-md-2 text-center number good" type="integer" value ="12,084.00">
                        <input class="col-md-2 text-center number fail" type="integer" value ="12,084.00" readonly>
                        <input class="col-md-2 text-center number" type="integer" value ="100" readonly>
                        <a href="{{ url('/group-dashboard') }}" class="marginRight">View More (Group)</a>
                    </div>
                    <div class="form-group padding2">
                        <label for="company" class="col-md-2 text-right control-label">Corporation</label>
                        <input class="col-md-2  text-center good number" type="integer" value ="12,084.00">
                        <input class="col-md-2 text-center fail number" type="integer" value ="12,084.00" readonly>
                        <input class="col-md-2 text-center number" type="integer" value ="100" readonly>
                        <a href="{{ url('/group-dashboard') }}" class="marginRight">View More (Group)</a>
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
              text: 'Cost (RM K)'
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
            name: 'Target Cost Saving ',
            data: [2, 5, 7, 9, 12, 15, 18, 22, 24, 26, 30, 34]
          }, {
            name: 'Current Cost Saving',
            data: [1.8, 4.5, 8.5, 13, 16, 18]
          }, {
            name: 'Yearly',
            data: [34, 34, 34, 34, 34, 34, 34, 34, 34, 34, 34, 34]
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