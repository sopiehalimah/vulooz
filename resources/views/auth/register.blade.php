<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up | Vulooz</title>
        <link rel="stylesheet" type="text/css" href="{{ url('css/login.css') }}">
    </head>
    <body>
        <div class="container">
            <div id="login" class="signin-card">
              <div class="logo-image">
              <a href=" {{ url('/') }}" class="logoLink"><h1 class="logo" style="font-weight:100">Vulooz</h1></a>
              </div>
              <h1 class="display1">Sign Up</h1>
              </br>
              <p class="subhead">
                  @foreach($errors->all() as $error)
                    <p class="subhead">{{ $error }}</p>
                  @endforeach
              </p>
              <form action="" method="POST" role="form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div id="form-login-full-name" class="form-group">
                  <input id="fullName" class="form-control" name="name" type="text" alt="fullName" required/>
                  <span class="form-highlight"></span>
                  <span class="form-bar"></span>
                  <label for="fullName" class="float-label">Full Name</label>
                </div>
                <div id="form-login-username" class="form-group">
                  <input id="email" class="form-control" name="email" type="text" alt="login" required/>
                  <span class="form-highlight"></span>
                  <span class="form-bar"></span>
                  <label for="email" class="float-label">Email</label>
                </div>
                <div id="form-login-password" class="form-group">
                  <input id="passwd" class="form-control" name="password" type="password" alt="password" required>
                  <span class="form-highlight"></span>
                  <span class="form-bar"></span>
                  <label for="password" class="float-label">Password</label>
                </div>
                <div id="form-login-password-confirm" class="form-group">
                  <input id="password_confirmation" class="form-control" name="password_confirmation" type="password" alt="password_confirmation" required>
                  <span class="form-highlight"></span>
                  <span class="form-bar"></span>
                  <label for="password_confirmation" class="float-label">Password Confirmation</label>
                </div>
                <div id="form-term-condition" class="form-group">
                  <div class="checkbox checkbox-default">       
                      <input id="remember" type="checkbox" value="yes" alt="Remember me" class="">
                      <label for="remember">I Read And Accept The Terms And Condition</label>      
                  </div>
                </div>
                <div>
                  <button class="btn btn-block btn-success ripple-effect" type="submit" name="Submit" alt="sign up">Sign Up</button>  
                </div>
              </form>
              <br/>
              <form action="/login">
              	<button class="btn btn-block btn-danger ripple-effect" type="submit" alt="Sign In" style="background:#ff4337">Sign In</button>                	
              </form>
            </div>
        </div>
        <script type="text/javascript" src="{{ url('/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('/js/login.js') }}"></script>
        <script type="text/javascript" src="{{ url('/js/ripple.js') }}"></script>
    </body>
</html>