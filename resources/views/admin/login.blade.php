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
            width: 600px;
            height: 430px;
            margin-top: 150px;
            color: white;
            padding: 20px;
            border-radius: 5px;
        }

        h2 {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-group {
            margin-top: 30px;
        }

        a {
            color: white;
        }

        #btn-login {
            margin-top: 30px;
            margin-left: 225 px;
        }

        .thong-bao {
            margin-top: 100px;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            @if(session('thongbao'))
            <div style="margin-top: 30px; position: absolute;" class="col-md-6 alert alert-danger">
                {{session('thongbao')}}
            </div>
            @endif

            <form id="form-admin-login" action="{{route('post.login')}}" method="post" class="user">
                {!! csrf_field() !!}
                <h2>Login</h2>
                <div class="form-group">
                    <Label for="exampleInputEmail">Email:</Label>
                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                        aria-describedby="emailHelp" name="email" placeholder="Enter Email Address... ">
                </div>

                <div class="form-group">
                    <Label for="exampleInputEmail">Password:</Label>
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                        name="password" placeholder="Password">
                </div>
                <input id="btn-login" type="submit" value="Đăng nhập" class="btn btn-primary">
                <hr>
            </form>
        </div>

    </div>

</body>

</html>