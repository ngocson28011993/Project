@extends('layouts.master')

@section('title') Login @stop


@section('css')
    @parent
    <style>
        body {background: #222;}
    </style>
@stop

@section('content')

    <div class="container">
        <div id="loginbox" style="margin-top:80px;" class="mainbox col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">
            <div class="panel panel-default" >
                <div class="panel-heading">
                    <div class="panel-title">{{{ trans('user.login.title') }}}</div>
                </div>

                <div style="padding-top:30px" class="panel-body" >
                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    {{ Form::open(array('route' => array('admin.adUser.doLogin'), 'method' => 'POST', 'class' => 'form-horizontal')) }}
                    {{--<form action="{{ URL::route('admin.adUser.doLogin') }}" id="loginform" class="form-horizontal" role="form" method="post">--}}

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            {{--<input id="login-email" type="email" class="form-control" name="email" placeholder="{{{ trans('user.e_mail') }}}" value="{{{ Input::old('email') }}}">--}}
                            {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => trans('user.e_mail'))) }}
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            {{--<input id="login-password" type="password" class="form-control" name="password" placeholder="{{{ trans('user.password') }}}">--}}
                            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => trans('user.password'))) }}
                        </div>

                        @if (Session::get('error'))
                            <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
                        @endif

                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                            <div class="col-sm-12 controls">
                                {{ Form::submit(trans('user.login.submit'), array('class' => 'btn btn-success form-control')) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@stop