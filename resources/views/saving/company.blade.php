@extends('layouts.app')
    
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Saving - Company List</h3>
        <ol class="breadcrumb">
        	<li><a href="{{ url('/home') }}">Home </a></li>
        	<li class="active">Saving - Company List</li>
        </ol>
        <div class="col-md-8">
        	<div style="overflow-x:auto;">
        		<table class="table table-bordered">
        			<tr>
        				<th class="text-center">No</th>
        				<th>Company</th>
        			</tr>
        			<?php $i=1 ?>
        			@forelse ($companies as $company)
        			<tr>
        				<td class="text-center">{{ $i }}</td>
        				<td>
        					<a href="{{ url('/saving') }}" class="marginRight">{{ $company->name }}</a>
        				</td>
        			</tr>
        			<?php $i++; ?>
        			@empty
        			<tr>
        				<td colspan="6">Looks like there is no initiative available.</td>
        			</tr>
        			@endforelse
        		</table>
        	</div>
        </div>
    </div>
</div>       
@endsection