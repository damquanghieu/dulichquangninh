@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" >
                    Thêm danh mục
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
                <form action="{{asset('admin/pages/category/addcategory')}}" method="POST">
               	 {!!csrf_field() !!}
                <div class="form-group">
                    <label style="margin-bottom: 15px; margin-top: 20px;">Tên danh mục</label>
                    <input class="form-control" name="name" placeholder="Nhập tên danh mục" />
 
                </div>
                
                <button type="submit" class="btn btn-primary">Thêm</button>
                <button type="reset" class="btn btn-danger">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection