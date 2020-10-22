<nav class="navbar  navbar-expand-lg  ">
    <div class="container">
        <a style="color: #fff;" class="navbar-brand" href="{{asset('trangchu')}}">Home</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ml-5">

                @foreach($shareviewdanhmuc as $key => $value)
                @break($key ==4)
                <li class="nav-item ml-4">
                    <a class="nav-link " ">{{$value->name}}</a>
                </li>
                @endforeach

                <li style=" margin-top: 8px; margin-left: 23px;" class="sub-menu">
                        <a class="dropdown-toggle" href="">Thêm</a>
                        <ul class="dropdown-content">
                            @foreach($shareviewdanhmuc as $key => $value)
                            @if($key >3)
                            <li><a href="">{{$value->name}}</a></li>
                            @endif
                            @endforeach
                        </ul>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>