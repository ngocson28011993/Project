@extends('admin.layout')

@section('title') User Management @stop

@section('script')
    @parent
    <script src="{{ asset('assets/others/select2/select2.min.js') }}"></script>
@stop

@section('admin_content')

    @yield('admin_user_content')

@stop