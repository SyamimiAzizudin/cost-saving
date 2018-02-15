@extends('layouts.app')

@section('content')

<!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">User Management </h3>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}">Home</a>
                    </li>
                    <li><a href="{{ url('/dashboard') }}">Dashboard</a>
                    </li>
                    <li class="active">User Management</li>
                </ol>
                
                    <div class="col-md-10 col-md-offset-1">

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Group</th>
                                <th>Company</th>
                                <th></th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Sulaiman</td>
                                <td>Admin</td>
                                <td>Manufacturing & Engineering</td>
                                <td>UMW Equipment Sdn Bhd</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-xs">Edit</a>
                                    <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Siti</td>
                                <td>Subsidary</td>
                                <td>Equipment</td>
                                <td>UMW (East Malaysia) Sdn Bhd</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-xs">Edit</a>
                                    <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Kian Lee</td>
                                <td>Board of Director</td>
                                <td>Manufacturing & Engineering</td>
                                <td>UMW Industries (1985) Sdn Bhd</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-xs">Edit</a>
                                    <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Thanisha</td>
                                <td>Subsidary</td>
                                <td>Manufacturing & Engineering</td>
                                <td>UMW Industrial Power Services Sdn Bhd</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-xs">Edit</a>
                                    <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Syafiq</td>
                                <td>Subsidary</td>
                                <td>Equipment</td>
                                <td>UMW Equipment & Engineering PTE LTD</td>
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
                    <h3>Create New User</h3>
                </div>

                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                        <input name="username" type="text" class="form-control" id="username" placeholder="Username" required >
                    </div>
                </div>

                <div class="form-group">
                    <label for="role" class="col-sm-3 control-label">Role</label>
                    <div class="col-sm-9">
                        <div class="radio">
                            <label>
                                <input name="role" type="radio" id="userRole" value="admin" required > Admin
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input name="role" type="radio" id="userRole" value="subsidary" required > Subsidary
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input name="role" type="radio" id="userRole" value="bod" required > Board of Director
                            </label>
                        </div>
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
                    <label for="company" class="col-sm-3 control-label">Company</label>
                    <div class="col-sm-9">
                        <select name="company" class="form-control" id="usercompany" required>
                            <option value="UMW Equipment Sdn Bhd" >UMW Equipment Sdn Bhd</option>
                            <option value="UMW (East Malaysia) Sdn Bhd" >UMW (East Malaysia) Sdn Bhd</option>
                            <option value="UMW Industries (1985) Sdn Bhd" >UMW Industries (1985) Sdn Bhd</option>
                            <option value="UMW Industrial Power Services Sdn Bhd" >UMW Industrial Power Services Sdn Bhd</option>
                            <option value="UMW Equipment & Engineering PTE LTD" >UMW Equipment & Engineering PTE LTD</option>
                        </select>
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