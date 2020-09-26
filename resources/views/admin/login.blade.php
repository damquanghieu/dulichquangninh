<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Admin-Login</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        background-color: #8ebcec;
        font-family: font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }

    #form-admin-login {
        background-color: #6c9de0;
        width: 400px;
        height: 400px;
        margin-top: 150px;
        color: white;
        padding: 20px;
        border-radius: 5px;
    }

    h2 {
        text-align: center;
        margin-bottom: 40px;
    }

    a {
        color: white;
    }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                {{$err}}<br>
                @endforeach
            </div>
            @endif

            @if(session('thongbao'))
            <div class="alert alert-danger">
                {{session('thongbao')}}
            </div>
            @endif
            <form id="form-admin-login" action="login" method="post" class="user">
                {!! csrf_field() !!}
                <h2>Login</h2>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                        aria-describedby="emailHelp" name="email" placeholder="Enter Email Address... ">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                        name="password" placeholder="Password">
                </div>
                <input type="submit" value="Đăng nhập" class="btn btn-primary btn-user btn-block">
                <hr>
            </form>
        </div>

    </div>

</body>

</html>