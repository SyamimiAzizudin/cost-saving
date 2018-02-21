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
        <div class="row ">
            <div class="col-md-8 col-md-offset-2 padding1">
                <div class="col-md-4">
                    <a type="button" href="{{ url('/dashboard') }}" class="btn btn-lg btn-primary custom">Main Dashboard</a>
                </div>
                <div class="col-md-4">
                    <a type="button" href="{{ url('/group-dashboard') }}" class="btn btn-lg btn-primary custom">Group Dashboard</a>
                </div>
                <div class="col-md-4">
                    <a type="button" href="{{ url('/user') }}" class="btn btn-lg btn-primary custom">User Management Page</a>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-8 col-md-offset-2 padding2">
                <div class="col-md-4">
                    <a type="button" href="{{ url('/company') }}" class="btn btn-lg btn-primary custom">Company Management Page</a>
                </div>
                <div class="col-md-4">
                    <a type="button" href="{{ url('/initiative-company') }}" class="btn btn-lg btn-primary custom">Initiative Management Page</a>
                </div>
                <div class="col-md-4">
                    <a type="button" href="{{ url('/saving-company') }}" class="btn btn-lg btn-primary custom">Saving Management Page</a>
                </div>
            </div>
        </div>

</div>
@endsection
