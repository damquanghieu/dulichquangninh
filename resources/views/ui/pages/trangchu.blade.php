@extends('ui.ui_layout.index')
@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">


        <?php $i = 0; ?>
        @foreach($slideshow as $slides)
        <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" @if($i==0); class="active" @endif></li>
        <?php $i++; ?>
        @endforeach
    </ol>
    <div class="carousel-inner">
        <?php $i=0; ?>
        @foreach($slideshow as $sl)
        <div @if($i==0) class="carousel-item active" @else class="carousel-item" @endif>
            <?php $i++; ?>
            <img class="img_slide" src="{{asset('slide_image/'.$sl->image_slide)}}" alt="">
            <div class="title_carousel">
                <h1>{{$sl->title_slide}}</h1>
                <h5>{{$sl->content_slide}}</h5>
            </div>
        </div>
        @endforeach

    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container">
    <div class="title-toplist">
        <h2>Tour hot nhất </h2>
        <p>Trọn vẹn Quảng Ninh</p>
    </div>
    <div class="row">
        <div class="col-md-4 top-tours">
            <img src="{{asset('ui/image_slide/noibat2.jpg')}}">
            <div class="tittle-top-tours">
                <p>Tour Hạ Long 1N: Hà Nội - Hạ Long</p>
                <a href="">860.000 VND </a>
            </div>
        </div>
        <div class="col-md-4 top-tours">
            <img src="{{asset('ui/image_slide/review4.jpg')}}">
            <div class="tittle-top-tours">
                <p>Tour Hong Kong 5N4D: Hong Kong - Chu Hải - Quảng Châu</p>
                <a href="">13.890.000 VND</a>
            </div>
        </div>
        <div class="col-md-4 top-tours">
            <img src="{{asset('ui/image_slide/review5.jpg')}}">
            <div class="tittle-top-tours">
                <p>Tour Đà Nẵng 4N3D: Hội An - Bà Nà - Huế - Động Phong Nha/Thiên Đường</p>
                <a href="">3.350.000 VND</a>
            </div>
        </div>
    </div>
</div>
<div class="all-toplist">
    <div class="container">
        <div class="title-toplist ">
            <h2>Top 5 trải nghiệm</h2>
            <p>Trọn vẹn Quảng Ninh</p>
        </div>
        <div class="row toplist">
            <div class="col-md-8">
                <div class="top-list">

                    <?php $one = $top5->shift(); ?>

                    <a href="{{route('test',['id'=>$one->id])}}"><img src="{{asset('tintuc_image/'.$one->image)}}"></a>
                    <div class="title-five">
                        <h2>{{$one->title}}</h2>
                        <p>{{$one->address}}</p>
                    </div>
                </div>

            </div>
            @foreach($top5 as $top5)
            <div class="col-md-4 ">
                <div class="top-list">
                    <img src="{{asset('tintuc_image/'.$top5->image)}}">
                    <div class="title-five">
                        <h2>{{$top5->title}}</h2>
                        <p>{{$top5->address}}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="title-toplist ">
            <h2>Nổi Bật</h2>
            <p>Quảng Ninh - Việt Nam thu nhỏ</p>
        </div>
        <div class="row hot">
            @foreach($toplist as $toplist)
            <div class="col-md-4">
                <div class="title-hot">
                    <div class="card">
                        <a href="{{asset('chitiet/'.$toplist->id)}}"><img src="{{asset('tintuc_image/'.$toplist->image)}}"
                                class="card-img-top" alt="..."></a>
                        <div class="card-body">
                            <a class="link" href="{{asset('chitiet/'.$toplist->id)}}">
                                <h5 class="card-title">{{$toplist->title}}</h5>
                            </a>
                            <p class="card-text">{{$toplist->address}}</p>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="title-toplist ">
            <h2>Ưu đãi hôm nay</h2>
            <p>Trọn vẹn Quảng Ninh</p>
        </div>

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

                <?php $i = 0; ?>
                @foreach($slideshow as $slide)
                <div @if($i==0) id="second-slide" class="carousel-item active" @else id="second-slide"
                    class="carousel-item" @endif>
                    <img class="img_slide" src="{{asset('tintuc_image/'.$slide->image)}}">
                    <div class="title-second-slide">
                        <h1>{{$slide->title}}</h1>
                        <h5>{{$slide->address}}</h5>
                    </div>
                    <?php $i++;?>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="title-toplist ">
            <h2>Kinh nghiệm du lịch Quảng Ninh</h2>
            <p>Trọn vẹn Quảng Ninh</p>
        </div>
        <div class="row hot">
            @foreach($reviews as $reviews)
            <div class="col-md-4">
                <div class="title-hot">
                    <div class="card">
                        <a href="{{asset('chitiet/'.$reviews->id)}}"><img src="{{asset('tintuc_image/'.$reviews->image)}}"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                        </a>
                        <a class="link" href="{{asset('chitiet/'.$reviews->id)}}">
                            <h5 class="card-title">{{$reviews->title}}</h5>
                        </a>
                        <p class="card-text">{{$reviews->address}}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection