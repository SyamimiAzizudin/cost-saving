@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"> Company Management</h3>
    </div>
</div>

<div class="row">
	<div class="col-md-8 col-md-offset-2 form-horizontal">
		<div class="page-header">
			<h3>Edit Company</h3>
		</div>

    	<div class="col-md-8 col-md-offset-2">
        {!! Form::model($company, ['method' => 'PATCH','action' =>  ['CompaniesController@update', $company->id], 'files' => true]) !!}

        	<div class="form-group">
        		<label for="name" class="col-sm-3 control-label">Name</label>
        		<div class="col-sm-9">
        			{!! Form::text('name', null, array('placeholder' => 'name','class' => 'form-control')) !!}
        		</div>
    		</div>

    		<div class="form-group">
        		<label for="group" class="col-sm-3 control-label">group</label>
        		<div class="col-sm-9">
        			{{ Form::select('group',
        				['Manufacturing & Engineering' => 'Manufacturing & Engineering', 'Equipment' => 'Equipment', 'Corporation' => 'Corporation'], null, ['class' => 'form-control']) }}
        		</div>
    		</div>

    		<div class="form-group">
    			<div class = "col-sm-offset-3 col-sm-9">
    				<a href="{{ action('CompaniesController@index') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</a>
    				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Save</button>
    			</div>
    		</div>
		{!! Form::close() !!}
    	</div>

    </div>
</div>
@endsection