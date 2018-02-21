@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
<<<<<<< HEAD
        <h3 class="page-header">Cost Saving Management - Equipment </h3>
        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Home</a>
            <li><a href="{{ url('/dashboard') }}">Dashboard</a>
            </li>
            <li><a href="{{ url('/group-dashboard') }}">Group Dashboard</a>
            </li>
            <li class="active">Cost Saving Management - Equipment</li>
        </ol>
        
        <div class="table-container">
            <div id="table-scroll" class="table-scroll">
              <div class="" style="overflow:auto; width: 100%;">
                <table class="main-table">
                  <thead>
                    <tr>
                        <th class="fixed-side">Area</th>
                        <th class="fixed-side">Analyze Factors Or Causes Contributing To Current Performance</th>
                        <th class="fixed-side">Proposed Action To Be Taken To Achieve Saving</th>
                        <th class="fixed-side">Cost Reduction</th>
                        <th class="col">JAN</th>
                        <th class="col">FEB</th>
                        <th class="col">MAR</th>
                        <th class="col">APR</th>
                        <th class="col">MAY</th>
                        <th class="col">JUN</th>
                        <th class="col">JUL</th>
                        <th class="col">AUG</th>
                        <th class="col">SEP</th>
                        <th class="col">OCT</th>
                        <th class="col">NOV</th>
                        <th class="col">DEC</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <th class="fixed-side" rowspan="3">1.1 Supplier</th>
                        <th class="fixed-side" rowspan="3">Contract Price Review</th>
                        <th class="fixed-side" rowspan="3">Principal and High Suppliers sadsadsds sdsdadsdsa sdsadsdsad sd adsd ad sda sd sa sad asd asda</th>
                        <th class="fixed-side">Target Cost (RM)</th>
=======
        <h3 class="page-header">Saving Management - Equipment </h3>
        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Home</a>
            <li><a href="{{ url('/company-saving') }}">Company List</a></li>
            <li class="active">Saving Management - Equipment</li>
        </ol>
            
        <div class="col-md-12 ">
            <div style="overflow-x:auto;">
                <table class="table table-bordered table-header" style="width:2080px;">
                    <tr>
                        <th>No</th>
                        <th>Company Name</th>
                        <th>Area</th>
                        <th width="10%">Analyze Factors Or Causes Contributing To Current Performances</th>
                        <th width="10%">Proposed Action To Be Taken to Achieve Savings</th>
                        <th width="5%">Target Cost Reduction</th>
                        <th width="5%">JAN</th>
                        <th width="5%">FEB</th>
                        <th width="5%">MAR</th>
                        <th width="5%">APR</th>
                        <th width="5%">MAY</th>
                        <th width="5%">JUN</th>
                        <th width="5%">JUL</th>
                        <th width="5%">AUG</th>
                        <th width="5%">SEP</th>
                        <th width="5%">OCT</th>
                        <th width="5%">NOV</th>
                        <th width="5%">DEC</th>
                    </tr>
                    <!-- no 1-->
                    <tr>
                        <td  rowspan="3">1.0</td>
                        <td  rowspan="3">UMW Equipment Sdn Bhd</td>
                        <td  rowspan="3">1.1 Supplier</td>
                        <td  rowspan="3">Contract Price Review</td>
                        <td  rowspan="3">Principal and High Suppliers
                            <li>price negotation</li>
                            <li>Special program pricing / extended warranty deals</li>
                            <li>Explore alternative sources for preferred suppliers</li>
                            <li>explore alternative spirces for preferred suppliers</li>
                        </td>
                        <td><b>Target Saving Cost (RM)</b></td>
>>>>>>> a6b1bd3e90212a7baba2078e4b024ff2a5be1efa
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
<<<<<<< HEAD
                    </tr>
                    <tr>
                        <th class="fixed-side">Actual Cost (RM)</th>
                        <td>25,000.00</td>
                        <td>25,000.00</td>
                        <td>25,000.00</td>
                        <td>25,000.00</td>
                        <td>25,000.00</td>
                        <td>25,000.00</td>
                        <td>25,000.00</td>
                        <td>25,000.00</td>
                        <td>25,000.00</td>
                        <td>25,000.00</td>
                        <td>25,000.00</td>
                        <td>25,000.00</td>
                    </tr>
                    <tr>
                        <th class="fixed-side">Percentage %</th>
                        <td>34</td>
                        <td>34</td>
                        <td>34</td>
                        <td>34</td>
                        <td>34</td>
                        <td>34</td>
                        <td>34</td>
                        <td>34</td>
                        <td>34</td>
                        <td>34</td>
                        <td>34</td>
                        <td>34</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
        
    </div>
</div>

        <br>

<script>
    // requires jquery library
    jQuery(document).ready(function() {
       jQuery(".main-table").clone(true).appendTo('#table-scroll').addClass('clone');   
     });
</script>
=======
                        
                    </tr>
                    <tr>
                        <td><b>Target Saving Cost (RM)</b></td>
                        <td><input type="integer" name="Actual" value="83, 893.00" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="83, 893.00" size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                    </tr>
                    <tr>
                        <td><b>%</b></td>
                        <td>3</td>
                        <td>3</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                    </tr>
                    <!-- no 2-->
                    <tr>
                        <td rowspan="3">2.0</td>
                        <td rowspan="3">UMW (East Malaysia) Sdn Bhd</td>
                        <td rowspan="3">2.1 Admin Support</td>
                        <td rowspan="3">Courier / post monthly printed statement of accounts and rental invoices to cusomers - thousand over copies</td>
                        <td rowspan="3">Implement E-statement and E-rental invoicing to replace hardcopy statements adn invoices adn email to customer</td>
                        <td><b>Target Saving Cost (RM)</b></td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        
                    </tr>
                    <tr>
                        <td><b>Target Saving Cost (RM)</b></td>
                        <td><input type="integer" name="Actual" value="83, 893.00" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="83, 893.00" size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                    </tr>
                    <tr>
                        <td><b>%</b></td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                    </tr>
                    <!-- no 3-->
                    <tr>
                        <td rowspan="3">3.0</td>
                        <td rowspan="3">UMW Industries (1985) Sdn Bhd</td>
                        <td rowspan="3">3.1 Parts localization</td>
                        <td rowspan="3">High cost of tyres imported together with machines from TICO</td>
                        <td rowspan="3">Purchase equipment with standard pnuematic tyres and install with cheaper Tokai tyres locally</td>
                        <td><b>Target Saving Cost (RM)</b></td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        <td>100,000.00</td>
                        
                    </tr>
                    <tr>
                        <td><b>Target Saving Cost (RM)</b></td>
                        <td><input type="integer" name="Actual" value="83, 893.00" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="83, 893.00" size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                        <td><input type="integer" name="Actual" value="" disabled size="8"></td>
                    </tr>
                    <tr>
                        <td><b>%</b></td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                        <td>4</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="pull-right">
        <a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Save</button>
    </div>
</div>
>>>>>>> a6b1bd3e90212a7baba2078e4b024ff2a5be1efa
@endsection