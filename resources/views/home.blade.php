@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div> -->

    <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Main</h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Sign In form -->
        <div class="row row1">
            <div class="col-md-8 col-md-offset-2 padding1">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <a type="button" href="{{ url('/dashboard') }}" class="btn btn-lg btn-primary custom1">Main Dashboard</a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <a type="button" href="{{ url('/company') }}" class="btn btn-lg btn-primary custom1">Company Management</a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <a type="button" href="{{ url('/user') }}" class="btn btn-lg btn-primary custom1">User Management</a>
                </div>
            </div>
        </div>
        <div class="row row1">
            <div class="col-md-8 col-md-offset-2 padding2">
                <div class="col-md-6 col-sm-4 col-xs-12 pad-left">
                    <a type="button" href="{{ url('/initiative-company') }}" class="btn btn-lg btn-primary custom1 button-right">Initiative Management</a>
                </div>
                <div class="col-md-6 col-sm-4 col-xs-12">
                    <a type="button" href="{{ url('/saving-company') }}" class="btn btn-lg btn-primary custom1">Saving Management</a>
                </div>
           </div>
        </div>

</div>
@endsection
