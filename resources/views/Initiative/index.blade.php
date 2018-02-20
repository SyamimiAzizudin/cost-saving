@include('modal.destroy-modal')
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
                                    <th class="text-center">No</th>
                                    <th width="15%">Area</th>
                                    <th width="25%">Analyze Factors Or Causes Contributing To Current Performances</th>
                                    <th width="30%">Proposed Action To Be Taken to Achieve Savings</th>
                                    <th width="15%"></th>
                                    <th width="10%"></th>
                                </tr>
                                <?php $i=1 ?>
                                @forelse ($initiatives as $init)
                                <tr>
                                    <td class="text-center">{{ $i }}</td>
                                    <td >{{ $init->area }}</td>
                                    <td >{{ $init->analyze }}</td>
                                    <td >{{ $init->action }}</td>
                                    <td>
                                        @if( $init->id )
                                        <a href="#" class="btn btn-warning btn-xs">Add</a>
                                        <a href="{{ action('InitiativesController@edit', $init->id) }}" class="btn btn-success btn-xs">Edit</a>
                                        <a href="{{ action('InitiativesController@destroy', $init->id) }}" class="btn btn-danger btn-xs" id="confirm-modal">Delete</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-success btn-xs">Approve</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                @empty
                                @endforelse
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
                {!! Form::open(array('route' => 'initiative.store','method'=>'POST', 'files' => true)) !!}
                
                <div class="form-group">
                    <label for="area" class="col-sm-3 control-label">Area</label>
                    <div class="col-sm-9">
                        {!! Form::text('area', null, array('placeholder' => 'Area','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="analyze" class="col-sm-3 control-label">Analyze Factors Or Causes Contributing To Current Performances</label>
                    <div class="col-sm-9">
                        {!! Form::textarea('analyze', null, array('placeholder' => 'Analyze Factor','class' => 'form-control')) !!}

                    </div>
                </div>

                <div class="form-group">
                    <label for="proposedaction" class="col-sm-3 control-label">Proposed Action To Be Taken to Achieve Savings</label>
                    <div class="col-sm-9">
                        {!! Form::textarea('action', null, array('placeholder' => 'Proposed Action','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class = "col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Create</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        
@endsection