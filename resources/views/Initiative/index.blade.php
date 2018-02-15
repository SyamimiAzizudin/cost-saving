@extends('layouts.app')

@section('content')
<div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Initiative - UMW Equipment Sdn Bhd</h3>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Initiative </li>
                </ol>
                
                    <div class="col-md-12 ">
                        <div style="overflow-x:auto;">
                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th width="15%">Area</th>
                                    <th width="25%">Analyze Factors Or Causes Contributing To Current Performances</th>
                                    <th width="30%">Proposed Action To Be Taken to Achieve Savings</th>
                                    <th width="15%"></th>
                                    <th width="10%"></th>
                                </tr>
                                <!-- no 1-->
                                <tr>
                                    <td>1.0</td>
                                    <td>1.1 Supplier</td>
                                    <td>Contract Price Review</td>
                                    <td>Principal and High Suppliers
                                        <li>price negotation</li>
                                        <li>Special program pricing / extended warranty deals</li>
                                        <li>Explore alternative sources for preferred suppliers</li>
                                        <li>explore alternative spirces for preferred suppliers</li>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-xs">Add</a>
                                        <a href="#" class="btn btn-primary btn-xs">Edit</a>
                                        <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                    </td>
                                    <td>
                                        <!-- <a href="#" class="btn btn-success btn-xs">Approve</a> -->
                                    </td>
                                </tr>
                                <!-- no 2-->
                                <tr>
                                    <td>2.0</td>
                                    <td>2.1 Admin Support</td>
                                    <td>Courier / post monthly printed statement of accounts and rental invoices to cusomers - thousand over copies</td>
                                    <td>Implement E-statement and E-rental invoicing to replace hardcopy statements adn invoices adn email to customer</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-xs">Add</a>
                                        <a href="#" class="btn btn-primary btn-xs">Edit</a>
                                        <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-success btn-xs">Approve</a>
                                    </td>
                                </tr>
                                <!-- no 3-->
                                <tr>
                                    <td>3.0</td>
                                    <td>3.1 Parts localization</td>
                                    <td>High cost of tyres imported together with machines from TICO</td>
                                    <td>Purchase equipment with standard pnuematic tyres and install with cheaper Tokai tyres locally</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-xs">Add</a>
                                        <a href="#" class="btn btn-primary btn-xs">Edit</a>
                                        <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-success btn-xs">Approve</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-8 col-md-offset-2 form-horizontal">
                <div class="page-header">
                    <h3>Create New Initiative</h3>
                </div>

                <div class="form-group">
                    <label for="area" class="col-sm-3 control-label">Area</label>
                    <div class="col-sm-9">
                        <input name="area" type="text" class="form-control" id="area" placeholder="Area" value="Parts localization" required >
                    </div>
                </div>

                <div class="form-group">
                    <label for="analyzefactor" class="col-sm-3 control-label">Analyze Factors Or Causes Contributing To Current Performances</label>
                    <div class="col-sm-9">
                        <textarea name="analyzefactor" class="form-control" id="analyzefactor" rows="5" placeholder="Analyze Factors Or Causes Contributing To Current Performances" required >High cost of tyres imported together with machines from TICO</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="proposedaction" class="col-sm-3 control-label">Proposed Action To Be Taken to Achieve Savings</label>
                    <div class="col-sm-9">
                        <textarea name="proposedaction" class="form-control" id="proposedaction" rows="5" placeholder="Proposed Action To Be Taken to Achieve Savings" required >Implement E-statement and E-rental invoicing to replace hardcopy statements adn invoices adn email to customer</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class = "col-sm-offset-3 col-sm-9">
                        <button class="btn btn-default" type="submit">Create</button>
                        <button class="btn btn-default" type="reset">Clear</button>
                    </div>
            </div>
        </div>
@endsection