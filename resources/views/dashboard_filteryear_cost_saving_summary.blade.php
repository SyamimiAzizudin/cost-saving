<div class="text-center">
    <div class="table-container">
        <div class="col-md-2 col-xs-12 panel panel-default">
            <div class="panel-heading text-center">
                 <h5>Yearly Target</h5>
            </div>
            <div class="panel-body text-center">
                <h3>RM {{ number_format( ($yearly_target/1000000), 2, '.', ',' ) }} m</h3>
            </div>
        </div>

        <div class="col-md-3 col-xs-12 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Target Savings (Cumm) </h5>
            </div>
            <div class="panel-body text-center">
                <h3>RM {{ number_format( ($cummulative_target), 2, '.', ',' ) }}</h3>
            </div>
        </div>
            
        <div class="col-md-3 col-xs-12 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Actual Savings (Cumm) </h5>
            </div>
            <div class="panel-body text-center">
                <h3>RM {{ number_format( ($cummulative_actual), 2, '.', ',' ) }}</h3>
            </div>
        </div>
        <div class="col-md-2 col-xs-12 panel panel-default margin-left-table">
            <div class="panel-heading text-center">
                <h5>Yearly % (Cumm) </h5>
            </div>
            <div class="panel-body text-center">
                <h3>{{ number_format(( ($cummulative_actual/$yearly_target) * 100),0) }} %</h3>
            </div>
        </div>
                
        <div class="col-md-2 col-xs-12 panel panel-default">
            <div class="panel-heading text-center">
                <h5>Monthly % (Cumm)</h5>
            </div>
            <div class="panel-body text-center">
                <h3>{{ number_format(($cummulative_actual/$cummulative_target) * 100,0) }} %</h3>
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

    <!-- Dashboard Section -->
    <div class="row">
        <div class="col-lg-12">
            <center>
                
                <div id="app">
                    <highcharts :options="options" ref="highcharts"></highcharts>
                </div>

                <br>

