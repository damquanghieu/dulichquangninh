@extends('ui.ui_layout.index')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 noidung">

			<h2>{!! $chitiet->title !!}</h2>
			<img src="{{asset('tintuc_image/'.$chitiet->image)}}">
			<h5>{!! $chitiet->address !!}</h5>
			
			<p>{!! $chitiet->content !!}</p>
		</div>
		<div class="col-md-4 lienquan">
			bbb
		</div>
	</div>
</div>

@endsection