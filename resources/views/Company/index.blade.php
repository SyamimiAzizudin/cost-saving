@include('modal.destroy-modal')
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
                            <?php $i = 0 ?>
                            @forelse($companies as $company)
                            <tr>
                                <td>{{ $companies->firstItem() + $i }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->group }}</td>
                                <td>
                                    @if( $company->user_id == Auth::user()->id)
                                    <a href="{{ action('CompaniesController@edit', $company->id) }}" class="btn btn-success btn-xs">Edit</a>
                                    <a href="{{ action('CompaniesController@destroy', $company->id) }}" class="btn btn-danger btn-xs" id="confirm-modal">Delete</a>
                                    @endif
                                </td>
                            </tr>
                            <?php $i++ ?>
                            @empty
                            <tr>
                                <td colspan="6">Looks like there is no user available.</td>
                            </tr>
                            @endforelse
                        </table>
                        <div class="text-center">
                            {{ $companies->links() }}
                        </div>
                    </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-8 col-md-offset-2 form-horizontal">
                <div class="page-header">
                    <h3>Create New Company</h3>
                </div>
                <!-- <form class="form-horizontal" action="{{ action('CompaniesController@store') }}" method="POST" enctype="multipart/form-data"> -->
               <!--  {{ csrf_field() }} -->
                {!! Form::open(array('route' => 'company.store','method'=>'POST', 'files' => true)) !!}

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Company Name</label>
                        <div class="col-sm-9">
                            <!-- <input name="name" type="text" class="form-control" id="name" placeholder="Company Name" value="{{ old('name') }}">
                            @if($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif -->
                            {!! Form::text('name', null, array('placeholder' => 'Company name','class' => 'form-control')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="group" class="col-sm-3 control-label">Group</label>
                        <div class="col-sm-9">
                            <!-- <div class="radio">
                                <label>
                                    <input name="group" type="radio" id="userGroup" value="mne" required > Manufacturing & Engineering
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input name="group" type="radio" id="userGroup" value="equipment" required > Equipment
                                </label>
                            </div> -->
                            {{ Form::select('group',
                                ['Manufacturing & Engineering' => 'Manufacturing & Engineering', 'Equipment' => 'Equipment', 'Corporation' => 'Corporation'], null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class = "col-sm-offset-3 col-sm-9">
                            <!-- <button class="btn btn-default" type="submit">Create</button> -->
                            <a href="{{ action('CompaniesController@index') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</a>
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
<script src="{{ asset('js/warning.js') }}"></script>
@endsection