<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{asset('admin/home')}}">
                <h4>{{ __('Chào mừng') }}</h4>
            </a>
        </div>
        <!-- /.navbar-header -->
        @if(isset($userLogin))
        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i>{{$userLogin->name}}</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> {{ __('Cài đặt') }} </a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{asset('admin/logout')}}"><i class="fa fa-sign-out fa-fw"></i> {{ __('Thoát') }}</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        @else
        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> {{ __('Thoát') }}</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        @endif
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <li>
                        <a style="margin-top: 30px;" href="{{asset('admin/home')}}"><i
                                class="fa fa-dashboard fa-fw"></i> {{ __('Trang chủ') }}</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube fa-fw"></i> {{ __('Quản lý danh mục') }}<span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a
                                    href="{{url('admin/pages/category/listcategory')}}">{{ __('Danh sách danh mục') }}</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-cube fa-fw"></i> {{ __('Quản lý tin Tức') }}<span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('get.list.posts')}}">{{ __('Tất cả tin tức') }}</a>
                            </li>
                            @foreach($shareviewdanhmuc as $shareviewdm)

                            <li>
                                <a href="{{route('get.one.post',['id'=>$shareviewdm->id])}}">{{$shareviewdm->name}}</a>
                            </li>
                            @endforeach

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube fa-fw"></i> {{ __('Quản lý slide') }}<span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{asset('admin/pages/slide/listslide')}}">{{ __('Tất cả slide') }}</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                   
                    @can('viewrole')
                    <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i> {{ __('Quản lý tài khoản') }}<span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('get.list.user')}}">{{ __('Tài Khoản') }}</a>
                            </li>
                        </ul>

                        <!-- /.nav-second-level -->
                    </li>
                    @endcan
                   
                   
                    @can('viewrole')
                    <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i>Quản lý phân quyền<span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('get.list.role')}}">{{ __('Roles') }}</a>
                            </li>
                            <li>
                                <a href="{{route('get.list.permission')}}">{{ __('Permissions') }}</a>
                            </li>
                        </ul>

                        <!-- /.nav-second-level -->
                    </li>
                    @endcan

                    
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>