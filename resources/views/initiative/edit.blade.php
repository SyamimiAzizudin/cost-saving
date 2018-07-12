@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Initiative Management</h3>
    </div>
</div>

<div class="row">
	<div class="col-md-8 col-md-offset-2 form-horizontal">
		<div class="page-header">
			<h3>Edit Initiative</h3>
		</div>

    	<div class="col-md-12">
        {!! Form::model($initiative, ['method' => 'PATCH','action' =>  ['InitiativesController@update', $initiative->id], 'files' => true]) !!}
            
            <div class="form-group">
                <div class="col-sm-9">
                    <input type="hidden" name="company_id" value="{{$initiative->company_id}}" class="form-control" >
                </div>
            </div>

        	<div class="form-group">
        		<label for="area" class="col-sm-3 control-label">Area</label>
        		<div class="col-sm-9">
        			{!! Form::textarea('area', null, array('placeholder' => 'Area','class' => 'form-control')) !!}
        		</div>
    		</div>

    		<div class="form-group">
        		<label for="analyze" class="col-sm-3 control-label">analyze</label>
        		<div class="col-sm-9">
                    {!! Form::textarea('analyze', null, array('placeholder' => 'Analyze Factor','class' => 'form-control')) !!}
        		</div>
    		</div>

            <div class="form-group">
                <label for="action" class="col-sm-3 control-label">Proposed Action</label>
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
    				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Save</button>
    			</div>
    		</div>
		{!! Form::close() !!}
    	</div>

    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'area' );
    CKEDITOR.replace( 'action' );
    CKEDITOR.replace( 'analyze' );
</script>
@endsection