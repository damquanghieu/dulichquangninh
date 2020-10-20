@extends('admin.layout.index')
@section('content')


<!--  <link href="{{asset('home/css/sb-admin-2.min.css')}}" rel="stylesheet"> -->


<div id="page-wrapper">

	<!-- Page Wrapper -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-12 col-lg-12">
				<!-- Area Chart -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Biểu đồ</h6>
					</div>
					<div class="card-body">
						<div class="chart-area">
							<div class="chartjs-size-monitor">
								<div class="chartjs-size-monitor-expand">
									<div class=""></div>
								</div>
								<div class="chartjs-size-monitor-shrink">
									<div class=""></div>
								</div>
							</div>
							<canvas id="myAreaChart" style="display: block; width: 668px; height: 320px;" width="668"
								height="320" class="chartjs-render-monitor"></canvas>
						</div>

					</div>
				</div>
				<!-- Bar Chart -->
			</div>

		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<!-- /.container-fluid -->

<script src="{{asset('home/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('home/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('home/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('home/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('home/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('home/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('home/js/demo/chart-pie-demo.js')}}"></script>
@endsection