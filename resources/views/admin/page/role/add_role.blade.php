@extends('admin.layout.index')
@section('content')
<style>
    .title-module {
        background-color: #4682B4;
        width: 100%;
        height: 40px;
        border-radius: 3px;
        padding-top: 8px;
    }

    .role_module {
        background-color: #c5dff5;
        width: 100%;
        margin-top: 10px;
        margin-left: 1px;
    }

    .role_module input {
        margin-right: 20px;
    }

    .content-module {
        padding-top: 20px;
        height: 70px;
    }

    .btn-add-role {
        margin-top: 20px;
        margin-bottom: 100px;
    }
</style>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Role
                    <small>Thêm</small>
                </h1>
            </div>
            <div class="col-lg-12">
                @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    {{$err}}<br>
                    @endforeach
                </div>
                @endif
                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            <form action="{{route('post.add.role')}}" method="POST">
                <div class="row">
                    <div class="col-md-12" style="padding-bottom:40px">
                        {!!csrf_field() !!}
                        <div class="form-group">
                            <label>Tên vai trò: </label>
                            <input class="form-control" name="name" placeholder="Tên vai trò" />
                        </div>
                        <div class="form-group">
                            <label>Miêu tả vai trò: </label>
                            <input type="description" class="form-control" name="description"
                                placeholder="Mô tả vai trò" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        @foreach ($parentPermission as $parent)
                        <div class="row role_module">
                            <div class="title-module col-md-12">
                                <label><input type="checkbox" class="check-all-module">{{$parent->name}}</label>
                            </div>
                            @foreach ($parent->child as $child)
                            <div class="content-module col-md-3">
                                <label><input class="checkbox" type="checkbox" name="permissions[]"
                                        value="{{$child->id}}">{{$child->display_name}}</label>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="btn-add-role">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection