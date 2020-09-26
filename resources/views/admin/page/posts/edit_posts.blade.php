@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{__('Danh Mục')}}
                    <small>Sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    {{$err}}<br>
                    @endforeach
                </div>
                @endif
                <form action="{{route('post.edit.posts')}}" method="POST" enctype="multipart/form-data">
                    {!!csrf_field() !!}
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$editPost->id}}">
                        <label>Tiêu đề</label>
                        <input class="form-control" name="title" value="{{$editPost->title}}" />
                        <label style="margin-top: 20px;">Địa chỉ</label>
                        <input class="form-control" name="address" value="{{$editPost->address}}" />
                        <label style="margin-top: 20px;">Ảnh hiện tại</label>
                        <div>
                            <img style="width:300px; height: 180px; border-radius: 4px;" src="{{asset('tintuc_image/'.$editPost->image)}}">
                            <input style="margin-top: 15px;" type="file" class="form-control" name="image"value="{{$editPost->anh}}" />
                        </div>
                        <label style="margin-top: 20px;">Nội dung</label>
                        <textarea id="demo" class="form-control ckeditor" rows="10" name="content"
                            value="{{$editPost->content}}">{{$editPost->content}}</textarea>
                        <label style="margin-top: 20px;">Thuộc danh mục</label>
                        <div>
                            <select class="form-control" name="category_id">
                                @foreach($listCategory as $listCategory)
                                <option value="{{$listCategory->id}}">{{$listCategory->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Sửa</button>
                        <button type="reset" class="btn btn-danger" style="margin-top: 20px">Reset</button>
                    </div>
                    <form>
            </div>
        </div>
    </div>
</div>

@endsection