@extends('admin.user.layout')

@section('title') Role Management @stop

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
        <div class="col-md-5">
            {{ Form::model($user, array('route' => array('admin.adUser.destroy', $user->id), 'method' => 'DELETE')) }}

                <p>Are you sure to delete user: {{{ $user->username }}}</p>

                <div class="form-group">
                    {{ link_to_route('admin.adUser.index', trans('admin_user.delete.cancel'), null, array('class' => 'btn btn-default')) }}
                    {{ Form::submit(trans('admin_user.delete.submit'), array('class' => 'btn btn-danger')) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop