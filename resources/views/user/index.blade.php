@include('modal.destroy-modal')
@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">User Management </h3>
        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Home</a></li>
            {{-- <li><a href="{{ url('/dashboard') }}">Dashboard</a></li> --}}
            <li class="active">User Management</li>
        </ol>
        
            <div class="col-md-10 col-md-offset-1">

                <table class="table table-striped table-bordered">
                    <tr>
                        <th class="text-center">No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Company Name</th>
                        <th></th>
                    </tr>
                    <?php $i=1 ?>
                    @forelse ($users as $user)
                    <tr>
                        <td class="text-center">{{ $i }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->company_id != null)
                                {{ $user->companies->name }}
                            @endif
                        </td>
                        <td>
                            @if($user->id)
                            <a href="{{ action('UsersController@edit', $user->id) }}" class="btn btn-success btn-xs">Edit</a>
                            <a href="{{ action('UsersController@destroy', $user->id) }}" class="btn btn-danger btn-xs" id="confirm-modal">Delete</a>
                            @endif
                        </td>
                    </tr>
                    <?php $i++; ?>
                    @empty
                    <tr>
                        <td colspan="6">Looks like there is no user available.</td>
                    </tr>
                    @endforelse
                </table>
            </div>
    </div>
</div>

<br>
<div class="row">
    <div class="col-md-8 col-md-offset-2 form-horizontal">
        <div class="page-header">
            <h3>Create New User</h3>
        </div>
    
        <form class="form-horizontal" method="POST" action="{{ route('user.store') }}">
            {{ csrf_field() }}

            <div class="form-group">
            <label for="company_id" class="col-md-4 control-label">Company</label>
                <div class="col-md-6">
                    <select name="company_id" class="form-control">
                        <option value="">Select Company</option>
                        @foreach($companies as $id => $company_name)
                            <option value="{{ $id }}">{{ $company_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="username" class="col-md-4 control-label">Username</label>

                <div class="col-md-6">
                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Register User
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection