@extends('ui.ui_layout.index')

@section('content')

<div class="container">

   	<div class="title">
            <h2>Tất cả</h2>
            <p>Quảng Ninh - Việt Nam thu nhỏ</p>
      </div>

   	<div class="row listtin">
   		@foreach($showtin as $showtin)
            <div class="col-md-4 ">
               <div  class="loaitin">
                  <a href="{{asset('chitiet/'.$showtin->id)}}"><img  src="{{asset('tintuc_image/'.$showtin->anh)}}"></a>
                     <div class="title-five">
                        <h3>{!! $showtin->tieude !!}</h3>
                        <p>{!! $showtin->diachi !!}</p>
                     </div>
               </div>
            </div>
            @endforeach
   	</div>

</div>

@endsection