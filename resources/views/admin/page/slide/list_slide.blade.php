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
                <h2 class="page-header">{{ __('Slide') }}
                    <small>{{ __('List') }}</small>
                    </h1>
            </div>
            @if(session('canhbao'))
            <div class="alert alert-danger">
                {{session('canhbao')}}
            </div>
            @endif
            <button id="delete-all-slide" style="margin: 5px;" class="btn btn-danger btn-xs"
                data-url="">{{ __('Delete') }}</button>

            <div style="margin: 5px;" class="btn btn-primary btn-xs">
                <a style="padding: 5px;color: white;text-decoration: none;" href="addslide">{{ __('Add') }}</a>
            </div>

            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th><input type="checkbox" id="check_all"></th>
                        <th>{{ __('Id') }}</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Ảnh</th>
                        <th>Vị trí</th>
                        <th>{{ __('Update_at') }}</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($listSlide as $listSlide)
                    <tr class="odd gradeX" align="center">
                        <td><input type="checkbox" class="checkbox" data-id="{{$listSlide ->id}}"></td>
                        <td>{{ $listSlide ->id }}</td>
                        <td>{{ $listSlide ->title_slide }}</td>
                        <td>{{ $listSlide ->content_slide }}</td>
                        <td>
                            <img style="width: 130px; height: 80px;" src="{{asset('slide_image/'.$listSlide->image_slide)}}">
                        </td>
                            @if($listSlide ->slide == 0)
                                <td>Slide chính</td>
                            @else
                                <td>Slide phụ</td> 
                            @endif
                        <td>{{ $listSlide ->updated_at }}</td>
                        <td><a href="editslide/{{$listSlide ->id}}"><button class="btn btn-primary ">Sửa</button></a></td>
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