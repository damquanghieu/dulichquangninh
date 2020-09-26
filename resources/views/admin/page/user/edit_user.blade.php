@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tài khoản
                    <small>Sửa</small>
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
                <form action="{{$user->id}}" method="POST">
                    <div class="form-group">
                        {!!csrf_field() !!}
                        <label>Tên tài khoản: </label>
                        <input class="form-control" name="name" placeholder="Please Enter Username"
                            value="{{$user->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Email: </label>
                        <input type="email" class="form-control" name="email" placeholder="Please Enter Email"
                            value="{{$user->email}}" />
                    </div>
                    <div class="form-group">
                        <select  class="js-example-basic-multiple form-control" name="roles[]" multiple="multiple">
                            @foreach ($roles as $role)
                            <option {{ $user->roles->contains('id',$role->id)? 'selected':'' }} value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Sửa</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <a href="{{route('post.edit.user',['id'=> $user->id])}}">Đổi mật khẩu</a>
                    <form>
            </div>
        </div>
    </div>
</div>
@endsection