@extends('layouts.app')

@section('content')


                <h3 class="page-header">View All Pages</h3>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}">Home</a>
                    </li>
                    <li><a href="{{ url('/dashboard') }}">Main Dashboard</a>
                    </li>
                    <li><a href="{{ url('/group-dashboard') }}">Group Dashboard</a>
                    </li>
                    <li class="active">View All Pages</li>
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
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                </tr>
                                <tr>
                                    <td><b>%</b></td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
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
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                </tr>
                                <tr>
                                    <td><b>%</b></td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
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
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                    <td>83,893.00</td>
                                </tr>
                                <tr>
                                    <td><b>%</b></td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>5</td>
                                </tr>
                            </table>
                        </div>
                    </div>



        <br>

@endsection