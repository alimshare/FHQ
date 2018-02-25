@extends('layouts.template')

@section('content')
<!-- Breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item active">Add</li>
</ol>

<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-8">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                <div class="card">
                    <div class="card-header">
                        <strong>User</strong>
                        <small>Form</small>
                    </div>

                    <div class="card-body">
                        {{ csrf_field() }}

                        <div class="row {{ $errors->has('name') ? ' has-error' : '' }}">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                            </div>
                        </div>

                        <div class="row{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-sm-12">
                                <label for="email">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-sm-12">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-sm-12">
                                <label for="password-confirm">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <a href="{{ url('user') }}" class="btn btn-outline-secondary pull-left" id="btnCancel"> <i class="icon-arrow-left"></i> Back</a>
                        <button type="submit" class="btn btn-outline-primary pull-right" id="btnSave"> Register</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection