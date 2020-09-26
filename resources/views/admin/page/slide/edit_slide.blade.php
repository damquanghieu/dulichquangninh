@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    Thêm tin tức
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-md-12" style="padding-bottom:120px">
                @if(session('loi'))
                <div class="alert alert-danger">
                    {{session('loi')}}
                </div>
                @endif
                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif

                @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    {{$err}}<br>
                    @endforeach
                </div>
                @endif
                <form action="{{route('post.edit.slide')}}" method="POST" enctype="multipart/form-data">
                    {!!csrf_field() !!}
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$editSlide->id}}">
                        <label>Tiêu đề</label>
                        <input class="form-control" name="title_slide" value="{{$editSlide->title_slide}}" />
                        <label style="margin-top: 20px;">Nội dung</label>
                        <input class="form-control" name="content_slide" value="{{$editSlide->content_slide}}"/>
                        <label style="margin-top: 20px; display:block;">Ảnh</label>
                        <img style="width:300px; height: 180px; border-radius: 4px;" src="{{asset('slide_image/'.$editSlide->image_slide)}}">
                        <input style="margin-top: 15px;" type="file" class="form-control" name="image_slide" />
                        <label style="margin-top: 20px;">Thuộc slide</label>
                        <div class="form-group">
                            <select class="form-control" name="slide">
                                <option value="0">Slide chính</option>
                                <option value="1">Slide phụ</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection