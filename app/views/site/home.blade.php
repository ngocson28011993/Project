@extends('layouts.master')

@section('title') Home page @stop

@section('content')

    @include('site.partials._navbar')

    @include('site.partials._slide')

    <div class="container">

      <div class="row">
        <div class="col-md-8">
            @include('site.partials._list_articles')
        </div>
        <div class="col-md-4">

        </div>

      </div>
    </div>
@stop