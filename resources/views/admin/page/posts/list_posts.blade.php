@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div>
                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
                <h1 class="page-header">{{ __('Tin tức') }}
                    <small>{{ __('Danh sách tin tức') }}</small>
                </h1>
            </div>

            @if(session('canhbao'))
            <div class="alert alert-danger">
                {{session('canhbao')}}
            </div>
            @endif
            <button id="delete-all-posts" style="margin-bottom: 10px;" class="btn btn-danger btn-xs "
                data-url="">{{ __('Delete') }}</button>

            <div style="margin-bottom: 10px;" class="btn btn-primary btn-xs">
                <a style="padding: 5px;color: white;text-decoration: none;" href="addposts
                                ">{{ __('Add') }}</a>
            </div>
            <!-- /.col-lg-12 -->
            <table style="max-width: 1000px;" class="table table-striped table-bordered table-hover"
                id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th><input type="checkbox" id="check_all"></th>
                        <th>{{ __('Id') }}</th>
                        <th>Tiều Đề</th>
                        <th>Địa Chỉ</th>
                        <th>Ảnh</th>
                        <th>Nội dung</th>
                        <th>Danh Mục</th>
                        <th>{{ __('Cập Nhật') }}</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($listPosts as $listPosts)
                    <tr class="odd gradeX" align="center">
                        <td><input type="checkbox" class="checkbox" data-id="{{$listPosts->id}}"></td>
                        <td>{!! $listPosts ->id !!}</td>
                        <td>{!! $listPosts ->title !!}</td>
                        <td>{!! $listPosts ->address !!}</td>
                        <td>
                            <img style="width: 130px; height: 80px;" src="{{asset('tintuc_image/'.$listPosts->image)}}">
                        </td>
                        <td style="text-align: justify; ">{!! $listPosts ->content !!}</td>
                        <td>{{ $listPosts->categories->name}}</td>
                        <td>{{ $listPosts ->updated_at }}</td>
                        <td style="margin:10px auto ;  " class="btn btn-primary btn-xs">
                            <a style="color: white;" href="editposts/{{$listPosts->id}}"> Sửa</a>
                        </td>
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