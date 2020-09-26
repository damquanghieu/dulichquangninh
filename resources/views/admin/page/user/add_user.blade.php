@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tài Khoản
                    <small>Thêm</small>
                </h1>
            </div>
            @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                {{$err}}<br>
                @endforeach
            </div>
            @endif
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{asset('admin/pages/user/adduser')}}" method="POST">
                    <div class="form-group">
                        {!!csrf_field() !!}
                        <label>Tên tài khoản: </label>
                        <input class="form-control" name="name" placeholder="Nhập tên" />
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu: </label>
                        <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu: </label>
                        <input type="password" class="form-control" name="repassword" placeholder="Nhập lại mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Email: </label>
                        <input type="email" class="form-control" name="email" placeholder="Nhập Email" />
                    </div>
                    <select class="js-example-basic-multiple form-control" name="roles[]"  multiple="multiple">
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection