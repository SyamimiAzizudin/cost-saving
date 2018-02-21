@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">

        <h3 class="page-header">Saving - Company Name </h3>
        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Home</a>
            <li><a href="{{ url('/company-saving') }}">Saving - Company List</a></li>
            <li class="active">Saving - Company Name</li>
        </ol>
        </div></div></div></div></div>
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
                        <th class="fixed-side" rowspan="3">Principal and High Suppliers sadsadsds sdsdadsdsa sdsadsdsad sd adsd ad sda sd sa sad asd asda </th>
                        <th class="fixed-side">Target Cost (RM)</th>
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
<div class="row">
    <div class="pull-right">
        <a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Save</button>
    </div>
</div>
<script>
    // requires jquery library
    jQuery(document).ready(function() {
       jQuery(".main-table").clone(true).appendTo('#table-scroll').addClass('clone');   
     });
</script>
@endsection