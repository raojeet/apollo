@extends('layouts.backend')
@section('content-header')
    {!! Breadcrumbs::render('user_edit', $user) !!}

    <div class="btn-group pull-right">
        <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown">Actions <i class="fa fa-angle-down"></i></button>
        <ul class="dropdown-menu pull-right" role="menu">
            <li><a href="{{ action('UsersController@show', $user) }}"><i class="fa fa-eye"></i> View</a></li>
            <li><a href="#" onclick="$('#user_destroy').submit();"><i class="fa fa-trash"></i> Archive</a></li>
            {{ html()->form('DELETE', action('UsersController@destroy', $user))->id('user_destroy')->open() }}
            {{ html()->form()->close() }}
        </ul>
    </div>
@endsection

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Edit {{ $user->name }}</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    {{ html()->modelForm($user, 'PUT', action('UsersController@update', $user->id))->open() }}

                    <div class="form-group has-feedback @if ($errors->has('name')) has-error @endif">
                        <label for="name">Name:</label>
                        {{ html()->text('name')->id('name')->class('form-control')->placeholder('Name') }}
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @include('errors._helpblock', ['field' => 'name'])
                    </div>

                    <div class="form-group has-feedback @if ($errors->has('current_password')) has-error @endif">
                        <label for="current_password">Current Password:</label>
                        {{ html()->password('current_password')->id('current_password')->class('form-control')->placeholder('Current Password') }}
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @include('errors._helpblock', ['field' => 'current_password'])
                    </div>
                    <div class="form-group has-feedback @if ($errors->has('new_password')) has-error @endif">
                        <label for="new_password">New Password:</label>
                        {{ html()->password('new_password')->id('new_password')->class('form-control')->placeholder('New Password') }}
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @include('errors._helpblock', ['field' => 'new_password'])
                    </div>
                    <div class="form-group has-feedback @if ($errors->has('password_confirmation')) has-error @endif">
                        <label for="password_confirmation">Confirm Password:</label>
                        {{ html()->password('password_confirmation')->id('password_confirmation')->class('form-control')->placeholder('Confirm Password') }}
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @include('errors._helpblock', ['field' => 'password_confirmation'])
                    </div>

                    <div class="form-group has-feedback @if ($errors->has('role')) has-error @endif">
                        <label for="name">Role:</label>
                        {{ html()->select('role', $roles)->id('role')->class('form-control')->value($user->role->name) }}
                        <span class="glyphicon glyphicon-shopping-cart form-control-feedback"></span>
                        @include('errors._helpblock', ['field' => 'role'])
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            @include('errors._block')
                        </div>
                    </div>

                    <input class="btn btn-primary pull-right" type="submit" value="Save Changes">
                    {{ html()->closeModelForm() }}
                </div>
            </div>
        </div>
    </div>
@endsection
