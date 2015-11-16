<!DOCTYPE html>
  <html>
   <head>
    <title>{{ $page['title'] }} - Vulooz</title>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,700,700italic' rel='stylesheet' type='text/css'>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{ url('css/materialize.min.css') }}"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="{{ url('css/custom.materialize.css') }}"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   </head>

   <body>
      <div class="navbar-fixed">
        <nav role="navigation">
           <div class="nav-wrapper container">
              <a id="logo-container" href="{{ url() }}" class="brand-logo">Vulooz</a>
              <a href="#" data-activates="mobile" class="button-collapse"><i class="material-icons">menu</i></a>
              <ul class="right hide-on-med-and-down">
                <li><a href="{{ url('login') }}">Login<i class="material-icons left">exit_to_app</i></a></li>
                <li><a href="{{ url('register') }}">Register<i class="material-icons left">add</i></a></li>
              </ul>
              <ul class="side-nav" id="mobile">
                <li><a href="{{ url('login') }}">Login<i class="material-icons left">exit_to_app</i></a></li>
                <li><a href="{{ url('register') }}">Register<i class="material-icons left">add</i></a></li>
              </ul>
            </div>
           </div>
        </nav>
      </div>
      <div class="container-fluid">
        @yield('content')
      </div>
      <footer class="page-footer green darken-3">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
              <h5 class="white-text">Vulooz</h5>
              <p class="grey-text text-lighten-4">New Way To Manage Your Finance</p>
            </div>
            <div class="col l4 offset-l2 s12">
              <h5 class="white-text">Links</h5>
              <ul>
                <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
          © 2015 Copyright
          <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
          </div>
        </div>
      </footer>
      <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
      <script type="text/javascript" src="{{ url('/js/materialize.min.js') }}"></script>
      <script type="text/javascript">
        $(function() {
          $(".button-collapse").sideNav();          
          if(location.pathname.split("/")[1] == ""){
            $('nav ul li a[href="{{ url() }}"]').parent('li').addClass('active');  
          }
          else{
            $('nav ul li a[href^="{{ url() }}/' + location.pathname.split("/")[1] + '"]').parent('li').addClass('active');
          }
        });
      </script>
   </body>
</html>