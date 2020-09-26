@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
                <h2 class="page-header">{{ __('Danh Mục') }}
                    <small>{{ __('List') }}</small>
                    </h1>
            </div>
            @if(session('canhbao'))
            <div class="alert alert-danger">
                {{session('canhbao')}}
            </div>
            @endif
            <button style="margin: 5px;" class="btn btn-danger btn-xs delete-all-category"
                data-url="">{{ __('Delete') }}</button>

            <div style="margin: 5px;" class="btn btn-primary btn-xs">
                <a style="padding: 5px;color: white;text-decoration: none;" href="addcategory">{{ __('Add') }}</a>
            </div>

            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th><input type="checkbox" id="check_all"></th>
                        <th>{{ __('Id') }}</th>
                        <th>{{ __('topic') }}</th>
                        <th>Số bài viết</th>

                        <th>{{ __('Update_at') }}</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach($listCategory as $listCategory)
                    <tr class="odd gradeX" align="center">

                        <td><input type="checkbox" class="checkbox" data-id="{{$listCategory ->id}}"></td>

                        <td>{{ $listCategory ->id }}</td>
                        <td>{{ $listCategory ->name }}</td>
                        <td>{{ count($listCategory->posts )}}</td>
                        <td>{{ $listCategory ->updated_at }}</td>
                        @can('editcategory')
                        <td><a href="editcategory/{{$listCategory ->id}}">
                                <button class="btn btn-primary ">Sửa</button></a></td>
                        @endcan
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