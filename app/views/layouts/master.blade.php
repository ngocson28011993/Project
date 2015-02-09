<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>@yield('title', 'Laravel PHP Framework')</title>

    @section('css')
        <link rel="stylesheet" href="{{ asset('assets/min/plugins.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/min/styles.min.css') }}">
    @show
</head>
<body>
   	@yield('content')

	@section('script')
        <script src="{{ asset('assets/others/jquery.js') }}"></script>
        <script src="{{ asset('assets/min/plugins.min.js') }}"></script>
        <script src="{{ asset('assets/min/scripts.min.js') }}"></script>
	@show
</body>
</html>
