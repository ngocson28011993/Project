@extends('admin.user.layout')

@section('title') Role Management @stop

@section('admin_user_content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Role <small>Management</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / role
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-5">
            {{ Form::model($role, array('route' => array('admin.adRole.destroy', $role->id), 'method' => 'DELETE')) }}
                <p>Are you sure to delete role: {{{ $role->name }}}</p>

                {{ link_to_route('admin.adRole.index', trans('admin_role.form.cancel'), null, array('class' => 'btn btn-default')) }}
                {{ Form::submit(trans('admin_role.form.delete'), array('class' => 'btn btn-danger')) }}

            {{ Form::close() }}
        </div>
    </div>
@stop