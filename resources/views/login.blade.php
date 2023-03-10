<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/loginpage.css') }}" />
</head>
<body>
    <div class="wrap">
        <div class="box">
            <div class="content">

                <form method="post" action="{{url('/login')}}">
                {{ csrf_field() }}
                    <div class="logo-wrap">
                        <i class="fa-solid fa-key"></i>
                    </div>
                    <h1>Welcome Back!</h1>
                    <div class="input-box">
                        <input type="email" name="email" required >
                        <span>Username</span>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" required >
                        <span>Password</span>
                    </div>
                    <div class="links">
                        <a href="#">Forgot Password?</a>
                    </div>
                    <div class="input-box">
                        <input type="submit" value="Login">
                    </div>
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                     <button type="button" class="close" data-dismiss="alert">×</button>
                     <strong style="color: red" >{{ $message }}</strong>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</body>
</html>
