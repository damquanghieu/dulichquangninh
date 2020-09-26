@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Permision
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
                            <th>Tên Permission</th>
                            <th>Tên Permission</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                        <tr class="odd gradeX" align="center">
                            <td><input type="checkbox" class="checkbox" data-id="{{$permission->id}}"></td>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->display_name }}</td>
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