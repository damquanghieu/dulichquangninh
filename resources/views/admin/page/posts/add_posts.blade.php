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

                @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    {{$err}}<br>
                    @endforeach
                </div>
                @endif
                <form action="{{route('post.add.posts')}}" method="POST" enctype="multipart/form-data">
                    {!!csrf_field() !!}
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" name="title" placeholder="Tiêu đề" />
                        <label style="margin-top: 20px;">Địa chỉ</label>
                        <input class="form-control" name="address" placeholder="Địa chỉ" />
                        <label style="margin-top: 20px;">Ảnh</label>
                        <input type="file" class="form-control" name="image" placeholder="Ảnh" />
                        <label style="margin-top: 20px;">Nội dung</label>
                        <textarea name="content" placeholder="Nội dung" id="editer1" rows="30">
                    </textarea>
                        <label style="margin-top: 20px;">Thuộc danh mục</label>
                        <div class="form-group">
                            <select class="form-control" id="sel1" name="category_id">
                                @foreach($listCategory as $listCategory)

                                <option value="{{$listCategory->id}}">{{$listCategory->name}}</option>

                                @endforeach
                            </select>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection