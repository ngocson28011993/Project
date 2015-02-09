@extends('admin.user.layout')

@section('admin_user_content')
<div class="user-page">

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

    <!-- Tool bar -->
    <div class="row">
        <div class="col-lg-12 tool-bar">
            @include('admin.user.search')
        </div>
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover users-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{{ trans('admin_user.table.username') }}}</th>
                            <th>{{{ trans('admin_user.table.e_mail') }}}</th>
                            <th>{{{ trans('admin_user.table.roles') }}}</th>
                            <th>{{{ trans('admin_user.table.active') }}}</th>
                            <th>{{{ trans('admin_user.table.created_at') }}}</th>
                            <th>{{{ trans('admin_user.table.actions.title') }}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @include('admin.user._list')
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>

@stop