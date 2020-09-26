@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tài Khoản
                    <small>{{ __('List') }}</small>
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
            <button style="margin: 5px;" class="btn btn-danger btn-xs delete-all-user"
                data-url="">{{ __('Delete') }}</button>
            <div style="margin: 5px;" class="btn btn-success btn-xs">
                <a style="padding: 5px;color: white;text-decoration: none;" href="adduser">{{ __('Add') }}</a>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th><input type="checkbox" id="check_all"></th>
                        <th>{{ __('Id') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Super_admin') }}</th>
                        <th>{{ __('Create_at') }}</th>
                        <th>{{ __('Update_at') }}</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="odd gradeX" align="center">
                        <td><input type="checkbox" class="checkbox" data-id="{{$user->id}}"></td>
                        <td>{{ $user->id}}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->super_admin}}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td><a href="{{route('get.edit.user',['id'=> $user->id])}}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

<!-- /#page-wrapper -->
@endsection