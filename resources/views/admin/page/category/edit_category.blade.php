@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">{{__('Danh Mục')}}
                            <small>Sửa</small>
                        
                        
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
                        <form action="{{$findCategory->id}}" method="POST">
                            <div class="form-group">
                                {!!csrf_field() !!}
                                <label>Tên danh mục</label>
                                <input class="form-control" name="name"  value="{{$findCategory->name}}" />
                            </div> 
                            <button type="submit" class="btn btn-primary">Sửa</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
@endsection