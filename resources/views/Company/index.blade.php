@extends('layouts.app')

@section('content')
<div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"> Company Management</h3>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}">Home</a>
                    </li>
                    <li><a href="{{ url('/group-dashboard') }}">Dashboard</a>
                    </li>
                    <li class="active">Company Management</li>
                </ol>

                    <div class="col-md-8 col-md-offset-2">

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Company Name</th>
                                <th>Group</th>
                                <th></th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>UMW Equipment Sdn Bhd</td>
                                <td>Manufacturing & Engineering</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-xs">Edit</a>
                                    <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>UMW (East Malaysia) Sdn Bhd</td>
                                <td>Equipment</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-xs">Edit</a>
                                    <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>UMW Industries (1985) Sdn Bhd</td>
                                <td>Manufacturing & Engineering</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-xs">Edit</a>
                                    <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>UMW Industrial Power Services Sdn Bhd</td>
                                <td>Equipment</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-xs">Edit</a>
                                    <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>UMW Equipment & Engineering PTE LTD</td>
                                <td>Manufacturing & Engineering</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-xs">Edit</a>
                                    <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                </td>
                            </tr>
                        </table>
                    </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-8 col-md-offset-2 form-horizontal">
                <div class="page-header">
                    <h3>Create New Company</h3>
                </div>

                <div class="form-group">
                    <label for="companyname" class="col-sm-3 control-label">Company Name</label>
                    <div class="col-sm-9">
                        <input name="companyname" type="text" class="form-control" id="companyname" placeholder="Company Name" required >
                    </div>
                </div>

                <div class="form-group">
                    <label for="group" class="col-sm-3 control-label">Group</label>
                    <div class="col-sm-9">
                        <div class="radio">
                            <label>
                                <input name="group" type="radio" id="userGroup" value="mne" required > Manufacturing & Engineering
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input name="group" type="radio" id="userGroup" value="equipment" required > Equipment
                            </label>
                        </div>
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