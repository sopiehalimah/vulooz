<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Vulooz | Login</title>

    <link href="{{ ('/inspinia/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ ('/inspinia/font-awesome/css/font-awesome.css ') }}" rel="stylesheet">

    <link href="{{ ('/inspinia/css/animate.css') }}" rel="stylesheet">
    <link href="{{ ('/inspinia/css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div style="margin-top:100px">
            <div>
            	<h1 class="logo-name" style="font-size:90px">Vulooz</h1>
            </div>
            <h3>Login</h3>
             @if (count($errors) > 0)
                <div class="notifError alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="m-t" id="formLogin" role="form" method="POST" action="/login">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="Email" name="email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btn-success block full-width m-b">Login</button>
                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
            </form>
            <p class="m-t"> <small>Vulooz &copy; 2015</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ ('/inspinia/js/jquery-2.1.1.js') }}"></script>

</body>

</html>
        