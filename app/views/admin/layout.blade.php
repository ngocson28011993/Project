@extends('layouts.master')

@section('title') Dashboard @stop

@section('content')

    <div id="wrapper">

        <!-- Navigation -->
        @include('admin.partials._navbar')

        <div id="page-wrapper">
            <div class="container-fluid">

                @yield('admin_content')

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
@stop