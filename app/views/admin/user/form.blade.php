@extends('admin.user.layout')

@section('admin_user_content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                User <small>Management</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / user
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-9">
            @if (isset($user))
                {{ Form::model($user, array('route' => array('admin.adUser.update', $user->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
            @else
                {{ Form::open(array('route' => array('admin.adUser.store'), 'method' => 'POST', 'class' => 'form-horizontal')) }}
            @endif
                <div class="form-group">
                    {{ Form::label('username', trans('admin_user.username'), array('class' => 'col-md-3 control-label')) }}
                    <div class="col-md-5">
                        {{ Form::text('username', null, array('class' => 'form-control')) }}
                        <span id="helpBlock" class="help-block">Username can not exist special characters</span>
                        @if (count($usernameErrors = $errors->get('username')))
                            <div class="alert alert-error alert-danger">
                                <ul>
                                    @foreach ($usernameErrors as $error)
                                        <li>{{{ $error }}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('email', trans('admin_user.e_mail'), array('class' => 'col-md-3 control-label')) }}
                    <div class="col-md-5">
                        {{ Form::email('email', null, array('class' => 'form-control')) }}
                        <span id="helpBlock" class="help-block">Must be valid email</span>
                        @if (count($emailErrors = $errors->get('email')))
                            <div class="alert alert-error alert-danger">
                                <ul>
                                    @foreach ($emailErrors as $error)
                                        <li>{{{ $error }}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('password', trans('admin_user.password'), array('class' => 'col-md-3 control-label')) }}
                    <div class="col-md-4">
                        {{ Form::password('password', array('class' => 'form-control')) }}
                        <span id="helpBlock" class="help-block">Password must be at least 4 character</span>
                        @if (count($passwordErrors = $errors->get('password')))
                            <div class="alert alert-error alert-danger">
                                <ul>
                                    @foreach ($passwordErrors as $error)
                                        <li>{{{ $error }}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('password_confirmation', trans('admin_user.password_confirmation'), array('class' => 'col-md-3 control-label')) }}
                    <div class="col-md-4">
                        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                    </div>
                    @if (count($confirmationErrors = $errors->get('password_confirmation')))
                        <div class="alert alert-error alert-danger">
                            <ul>
                                @foreach ($confirmationErrors as $error)
                                    <li>{{{ $error }}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    {{ Form::label('email', trans('admin_user.role'), array('class' => 'col-md-3 control-label')) }}
                    <div class="col-md-6">
                        {{ Form::select('roles[]', $roles, isset($user) ? $user->roles : null, array('class' => 'form-control select2-container', 'multiple' => 'multiple')) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('confirmed', 1, isset($user) && $user->confirmed ? true : false) }} Confirmed
                        </label>
                    </div>
                    </div>
                </div>

                @if (Session::get('error'))
                    <div class="col-sm-offset-3 col-sm-9">
                        <div class="alert alert-error alert-danger">
                            <ul>
                                @foreach (Session::get('error') as $error)
                                    <li>{{{ $error }}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="reset" class="btn btn-default">{{{ trans('admin_user.create.clear') }}}</button>
                        {{ Form::submit(isset($user) ? trans('admin_user.edit.submit') : trans('admin_user.create.submit'), array('class' => 'btn btn-primary')) }}
                    </div>
                </div>

            {{ Form::close() }}
        </div>
    </div>
@stop