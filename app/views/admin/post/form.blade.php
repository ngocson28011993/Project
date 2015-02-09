@extends('admin.layout')

@section("title") Post
@stop

@section("admin_content")
    <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Post <small>Management</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Dashboard / post
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
             <form>
                <input type="text" name="title">
                <textarea name="description"></textarea>
                <textarea name="content"></textarea>
             </form>
            </div>
        </div>
@stop
