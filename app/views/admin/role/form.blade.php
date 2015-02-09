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
        @if (isset($role))
            {{ Form::model($role, array('route' => array('admin.adRole.update', $role->id), 'method' => 'PUT')) }}
        @else
            {{ Form::open(array('route' => array('admin.adRole.store'))) }}
        @endif
            <div class="form-group">
                {{ Form::text('name', null, array('class' => 'form-control')) }}
                <span id="helpBlock" class="help-block">{{{ trans('admin_role.form.help_block') }}}</span>
                @if (count($nameErrors = $errors->get('name')))
                    <div class="alert alert-error alert-danger">
                        <ul>
                            @foreach ($nameErrors as $error)
                                <li>{{{ $error }}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="form-group">
                {{ link_to_route('admin.adRole.index', trans('admin_role.form.cancel'), null, array('class' => 'btn btn-default')) }}
                {{ Form::submit(trans('admin_role.form.save'), array('class' => 'btn btn-primary')) }}
            </div>

        {{ Form::close() }}
        </div>
    </div>
@stop