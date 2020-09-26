<!DOCTYPE html>
<html>
<head>
	<title>DulichQuangNinh</title>
		<meta charset="utf-8">
	  	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	  	<link rel="stylesheet" href="{{asset('ui/bootstrap4/css/bootstrap.min.css')}}">
	 	<link rel="stylesheet" type="text/css" href="{{asset('ui/vivu.css')}}">
	 	<link rel="stylesheet" type="text/css" href="{{asset('ui/loaitin.css')}}">
	 	<link rel="stylesheet" type="text/css" href="{{asset('ui/chitiet.css')}}">
		<script src="{{asset('ui/bootstrap4/jquery-3.4.1.min.js')}}"></script>
		<script src ="{{asset('ui/bootstrap4/js/bootstrap.min.js')}}"></script>
		<link href="{{asset('admin1/bower_components/font-awesome/css/font-awesome.min.css')}}" 
		rel="stylesheet" type="text/css">

</head>
<body>
	
	@include('ui.ui_layout.ui_header')

		@yield('content')

	@include('ui.ui_layout.ui_footer')
</div>
</body>
</html>