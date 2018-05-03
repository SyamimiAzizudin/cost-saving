@extends('layouts.app')

@section('content')

<div class="row">
            <div class="col-md-8 col-md-offset-2 form-horizontal">
                <div class="page-header">
                    <h3>Edit Cost Saving</h3>
                </div>

                <form class="form-horizontal" action="{{ action('SavingsController@update', $init->id) }}" method="POST" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

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
                        <label for="area" class="col-sm-3 control-label">Area</label>
                        <div class="col-sm-9">
                            <input name="area" type="text" class="form-control" id="area" placeholder="Area" required >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="analyzefactor" class="col-sm-3 control-label">Analyze Factors Or Causes Contributing To Current Performances</label>
                        <div class="col-sm-9">
                            <textarea name="analyzefactor" class="form-control" id="analyzefactor" rows="5" placeholder="Analyze Factors Or Causes Contributing To Current Performances" required ></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="proposedaction" class="col-sm-3 control-label">Proposed Action To Be Taken to Achieve Savings</label>
                        <div class="col-sm-9">
                            <textarea name="proposedaction" class="form-control" id="proposedaction" rows="5" placeholder="Proposed Action To Be Taken to Achieve Savings" required ></textarea>
                        </div>
                    </div>

                    <div class="form-group">
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
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tts" class="col-sm-3 control-label">Actual Saving For The Month (RM)</label>
                            <div class="col-sm-9">
                            <input name="tts" type="number" class="form-control" id="tts" placeholder="Actual Saving For The Month" min="0" required>
                      </div>
                    </div>

                    <div class="form-group">
                        <div class = "col-sm-offset-3 col-sm-9">
                            <button class="btn btn-default" type="submit">Submit</button>
                            <button class="btn btn-default" type="reset">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
@endsection