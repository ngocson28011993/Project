@extends('layouts.master')

@section('title') Sign in @stop

@section('content')

    @include('site.partials._navbar')

    <div class="container">
        <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4" style="margin-top:150px;">
                @if (Session::get('error'))
                    <div class="alert alert-warning" role="alert">{{{ Session::get('error') }}}</div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign in</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ URL::route('login-submit') }}" role="form" method="post">

                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control input" placeholder="Email Address" value="{{{ Input::old('email') }}}">
                                    @if ($errors->has('email'))
                                        <small class="error-block">
                                            @foreach ($errors->get('email') as $message)
                                                {{{ $message }}}
                                            @endforeach
                                        </small>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input" placeholder="Password">
                                    @if ($errors->has('password'))
                                        <small class="error-block">
                                            @foreach ($errors->get('password') as $message)
                                                {{ $message }}
                                            @endforeach
                                        </small>
                                    @endif
                                </div>

                                <input type="submit" value="Login" class="btn btn-info btn-block">
                                {{ Form::token() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop