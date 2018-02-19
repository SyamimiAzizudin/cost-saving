@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Create User</h2>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-10">              
                <form class="form-horizontal" action="{{ action('PostsController@store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    
                    <div class="form-group{{ $errors->has('post_content') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Post Content</label>