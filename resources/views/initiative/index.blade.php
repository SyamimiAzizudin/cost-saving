@include('modal.destroy-modal')
@extends('layouts.app')

@section('content')
<div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Initiative - {{ $company->name }}</h3>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}">Home </a></li>
                    <li><a href="{{ url('/initiative-company') }}">Initiative - Company List</a></li>
                    <li class="active">Initiative - {{ $company->name }}</li>
                </ol>
                
                    <div class="col-md-12 ">
                        <div style="overflow-x:auto;">
                            <table class="table table-bordered">
                                <tr>
                                    <th class="text-center">Order Id</th>
                                    <th width="15%">Area</th>
                                    <th width="25%">Analyze Factors Or Causes Contributing To Current Performances</th>
                                    <th width="30%">Proposed Action To Be Taken to Achieve Savings</th>
                                    <th width="15%"></th>
                                </tr>
                                <?php $i=1 ?>
                                @forelse ($initiatives as $initiative)
                                <tr>
                                    <td class="text-center">{{  $initiative->order_id }}</td>
                                    <td >{{ $initiative->area }}</td>
                                    <td >{{ $initiative->analyze }}</td>
                                    <td >{{ $initiative->action }}</td>
                                    <td>
                                        @if( $initiative->id )
                                        <a href="{{ action('InitiativesController@edit', $initiative->id) }}" class="btn btn-success btn-xs">Edit</a>
                                        <a href="{{ action('InitiativesController@destroy', $initiative->id) }}" class="btn btn-danger btn-xs" id="confirm-modal">Delete</a>
                                        @endif
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                @empty
                                <tr>
                                    <td colspan="6">Looks like there is no initiative in this company.</td>
                                </tr>
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
                    <label for="area" class="col-sm-3 control-label">Company</label>
                    <div class="col-sm-9">
                        {{-- <select name="company_id" class="form-control">
                            @foreach($companies as $id => $company_name)
                                <option value="{{ $id }}">{{ $company_name }}</option>
                            @endforeach
                        </select> --}}
                        {{-- <h6>{{ $company->name }}</h6> --}}
                        <input type="text" name ="company_name" value="{{$company->name}}" class="form-control" disabled>
                    </div>
                </div>
                
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
                    <label for="order_id" class="col-sm-3 control-label">Order Id</label>
                    <div class="col-sm-9">
                        {!! Form::number('order_id', null, array('placeholder' => 'Order Id','class' => 'form-control')) !!}
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