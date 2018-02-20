@include('modal.destroy-modal')
@extends('layouts.app')

@section('content')

<!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">User Management </h3>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}">Home</a>
                    </li>
                    <li><a href="{{ url('/dashboard') }}">Dashboard</a>
                    </li>
                    <li class="active">User Management</li>
                </ol>
                
                    <div class="col-md-10 col-md-offset-1">

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th class="text-center">No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                            <?php $i=1 ?>
                            @forelse ($users as $user)
                            <tr>
                                <td class="text-center">{{ $i }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
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
                {!! Form::open(array('route' => 'user.store','method'=>'POST', 'files' => true)) !!}

                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                        {!! Form::text('username', null, array('placeholder' => 'Username','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-sm-3 control-label">password</label>
                    <div class="col-sm-9">
                        <input name="password" type="password" class="form-control" id="password" placeholder="password" value="{{ old('password') }}" required >

                        @if($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

                <!-- <div class="form-group">
                    <label for="role" class="col-sm-3 control-label">Role</label>
                    <div class="col-sm-9">
                        <div class="radio">
                            <label>
                                <input name="role" type="radio" id="userRole" value="admin" required > Admin
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input name="role" type="radio" id="userRole" value="subsidary" required > Subsidary
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input name="role" type="radio" id="userRole" value="bod" required > Board of Director
                            </label>
                        </div>
                        {{ Form::select('role',
                            ['admin' => 'Admin', 'subsidary' => 'Subsidary', 'board' => 'Board of Director'], null, ['class' => 'form-control']) }}                        
                    </div>
                </div> -->

                <!-- <div class="form-group">
                    <label for="group" class="col-sm-3 control-label">Group</label>
                    <div class="col-sm-9">
                        
                    </div>
                </div> -->
                <!-- <div class="form-group">
                    <label for="company" class="col-sm-3 control-label">Company</label>
                    <div class="col-sm-9">
                        <select name="company" class="form-control" id="usercompany" required>
                            <option value="UMW Equipment Sdn Bhd" >UMW Equipment Sdn Bhd</option>
                            <option value="UMW (East Malaysia) Sdn Bhd" >UMW (East Malaysia) Sdn Bhd</option>
                            <option value="UMW Industries (1985) Sdn Bhd" >UMW Industries (1985) Sdn Bhd</option>
                            <option value="UMW Industrial Power Services Sdn Bhd" >UMW Industrial Power Services Sdn Bhd</option>
                            <option value="UMW Equipment & Engineering PTE LTD" >UMW Equipment & Engineering PTE LTD</option>
                        </select>
                    </div>
                </div> -->

                <div class="form-group">
                    <div class = "col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Create</button>
                    </div>
            </div>
        </div>
<script src="{{ asset('js/warning.js') }}"></script>
@endsection