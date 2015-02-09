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
        <div class="col-md-12 form-group">
            <a href="{{ URL::route('admin.adRole.create') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Create new
            </a>
        </div>

        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover roles-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{{ trans('admin_role.table.role_name') }}}</th>
                            <th>{{{ trans('admin_role.table.actions.title') }}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr class="role-item">
                                <td>{{ $role->id }}</td>
                                <td>{{{ $role->name }}}</td>
                                <td>
                                    <i class="fa fa-edit"></i> <a href="{{ URL::route('admin.adRole.edit', array('adRole' => $role->id)) }}">{{{ trans('admin_role.table.actions.edit') }}}</a>
                                    <i class="fa fa-trash"></i> <a class="delete-btn" href="{{ URL::route('admin.adRole.delete', array('adRole' => $role->id)) }}">{{{ trans('admin_role.table.actions.delete') }}}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $roles->links() }}
            </div>
        </div>
    </div>
@stop