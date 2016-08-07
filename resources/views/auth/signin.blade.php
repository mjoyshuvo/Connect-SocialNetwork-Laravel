@extends('layouts.master')
@section('content')
	<div class="container" style="margin-left: 250px; margin-top: 50px">
	<center>
	<div class="row">
    <div class="col-lg-6">
    <h3 style="color: teal">Sign in</h3> <hr>
        <form class="form-vertical" role="form" method="post" action="{{ route('signin') }}">
            <div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email" class="control-label">Your email address</label>
                <input type="text" name="email" class="form-control" id="email" value="{{ Request::old('email') }}">
                @if ($errors->has('email'))
                	<span class="help-block" style="color:darkred;">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? 'has-error': '' }}">
                <label for="password" class="control-label">Choose a password</label>
                <input type="password" name="password" class="form-control" id="password">
                @if ($errors->has('password'))
                	<span class="help-block" style="color:darkred;">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info btn-xm" style="font-size: 14px; color:white;">Sign in</button>
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
</div>
</center>

</div>
@stop
