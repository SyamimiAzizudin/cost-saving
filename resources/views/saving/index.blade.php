@extends('layouts.app')

@section('content')
<div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Cost Saving Management - Equipment </h3>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}">Home</a>
                    <li><a href="{{ url('/dashboard') }}">Dashboard</a>
                    </li>
                    <li><a href="{{ url('/group-dashboard') }}">Group Dashboard</a>
                    </li>
                    <li class="active">Cost Saving Management - Equipment</li>
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
                                    <th width="5%"></th>
                                </tr>
                                <!-- no 1-->
                                <tr>
                                    <td  rowspan="3"></td>
                                    <td  rowspan="3"></td>
                                    <td  rowspan="3"></td>
                                    <td  rowspan="3"></td>
                                    <td  rowspan="3"></td>
                                    <td><b>Target Saving Cost (RM)</b></td>
                                    <td>100,000.00</td>
                                    <td>100,000.00</td>
                                    <td>100,000.00</td>
                                    <td>100,000.00</td>
                                    <td>100,000.00</td>a
                                    <td>100,000.00</td>
                                    <td>100,000.00</td>
                                    <td>100,000.00</td>
                                    <td>100,000.00</td>
                                    <td>100,000.00</td>
                                    <td>100,000.00</td>
                                    <td>100,000.00</td>
                                    <td  rowspan="3">
                                        <a href="#" class="btn btn-success btn-xs">Edit</a>
                                        <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                    </td>
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
                                    <td><input type="integer" name="percent" value="2" disabled size="8"></td>
                                    <td><input type="integer" name="percent" value="3" size="8"></td>
                                    <td><input type="integer" name="percent" value="" disabled size="8"></td>
                                    <td><input type="integer" name="percent" value="" disabled size="8"></td>
                                    <td><input type="integer" name="percent" value="" disabled size="8"></td>
                                    <td><input type="integer" name="percent" value="" disabled size="8"></td>
                                    <td><input type="integer" name="percent" value="" disabled size="8"></td>
                                    <td><input type="integer" name="percent" value="" disabled size="8"></td>
                                    <td><input type="integer" name="percent" value="" disabled size="8"></td>
                                    <td><input type="integer" name="percent" value="" disabled size="8"></td>
                                    <td><input type="integer" name="percent" value="" disabled size="8"></td>
                                    <td><input type="integer" name="percent" value="" disabled size="8"></td>
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
                    <h3>New Cost Saving</h3>
                </div>

                <form class="form-horizontal" action="{{ action('SavingsController@store') }}" method="POST" enctype="multipart/form-data">

                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('company') ? ' has-error' : '' }}">
                        <label for="company" class="col-sm-3 control-label">Company</label>
                        <div class="col-sm-9">
                            <select name="company" class="form-control" id="company" required>
                                <option value="UMW Equipment Sdn Bhd" >UMW Equipment Sdn Bhd</option>
                                <option value="UMW (East Malaysia) Sdn Bhd" >UMW (East Malaysia) Sdn Bhd</option>
                                <option value="UMW Industries (1985) Sdn Bhd" >UMW Industries (1985) Sdn Bhd</option>
                                <option value="UMW Industrial Power Services Sdn Bhd" >UMW Industrial Power Services Sdn Bhd</option>
                                <option value="UMW Equipment & Engineering PTE LTD" >UMW Equipment & Engineering PTE LTD</option>
                            </select>

                            @if($errors->has('company'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('company') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('area') ? ' has-error' : '' }}">
                        <label for="area" class="col-sm-3 control-label">Area</label>
                        <div class="col-sm-9">
                            <input name="area" type="text" class="form-control" id="area" placeholder="Area" required >
                            @if($errors->has('area'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('area') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('analyze') ? ' has-error' : '' }}">
                        <label for="analyzefactor" class="col-sm-3 control-label">Analyze Factors Or Causes Contributing To Current Performances</label>
                        <div class="col-sm-9">
                            <textarea name="analyze" class="form-control" id="analyze" rows="5" placeholder="Analyze Factors Or Causes Contributing To Current Performances" required ></textarea>
                            @if($errors->has('analyze'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('analyze') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('action') ? ' has-error' : '' }}">
                        <label for="proposedaction" class="col-sm-3 control-label">Proposed Action To Be Taken to Achieve Savings</label>
                        <div class="col-sm-9">
                            <textarea name="action" class="form-control" id="action" rows="5" placeholder="Proposed Action To Be Taken to Achieve Savings" required ></textarea>
                            @if($errors->has('action'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('action') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('month') ? ' has-error' : '' }}">
                        <label for="month" class="col-sm-3 control-label">Month</label>
                        <div class="col-sm-9">
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
                            @if($errors->has('month'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('month') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('tts') ? ' has-error' : '' }}">
                        <label for="tts" class="col-sm-3 control-label">Actual Saving For The Month (RM)</label>
                            <div class="col-sm-9">
                            <input name="tts" type="number" class="form-control" id="tts" placeholder="Actual Saving For The Month" min="0" required>
                            @if($errors->has('tts'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tts') }}</strong>
                                </span>
                            @endif
                            </div>
                    </div>

                    <div class="form-group">
                        <div class = "col-sm-offset-3 col-sm-9">
                            <button class="btn btn-default" type="submit">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection