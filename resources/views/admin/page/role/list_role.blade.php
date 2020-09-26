@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Vai trò
                    <small>Role</small>
                </h1>
            </div>
            @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif
            @if(session('canhbao'))
            <div class="alert alert-danger">
                {{session('canhbao')}}
            </div>
            @endif
            <button id="delete-all-role" style="margin: 5px;" class="btn btn-danger btn-xs "
                data-url="">{{ __('Delete') }}</button>
            <div style="margin: 5px;" class="btn btn-success btn-xs">
                <a style="padding: 5px;color: white;text-decoration: none;"
                    href="{{route('get.add.role')}}">{{ __('Add') }}</a>
            </div>
            <!-- /.col-lg-12 -->
            <div class="test">


                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th><input type="checkbox" id="check_all"></th>
                            <th>Id</th>
                            <th>Tên role</th>
                            <th>Tên role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getRoles as $role)
                        <tr class="odd gradeX" align="center">
                            <td><input type="checkbox" class="checkbox" data-id="{{$role->id}}"></td>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->description }}</td>
                            <td><a class="btn btn-primary btn-sm"
                                    href="{{route('get.edit.role',['id'=>$role->id])}}">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

<!-- /#page-wrapper -->
@endsection