<?php use Carbon\Carbon; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['pageTitle']}} | Vulooz</title>
    <link href="{{ url('inspinia/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('inspinia/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ url('inspinia/css/animate.css') }}" rel="stylesheet">
    <link href="{{ url('inspinia/css/style.css') }}" rel="stylesheet">
    @yield('style')
</head>

<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <i class="fa fa-reorder"></i>
                </button>
                <a href="{{ url('/') }}" class="navbar-brand">Vulooz</a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li>
                      <a href="/income">Income</a>
                    </li>
                    <li>
                      <a href="/spending">Spending</a>
                    </li>
                    <li>
                      <a href="/plans">Plans</a>
                    </li>
                    <li>
                      <a href="/stats">Statistic</a>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                      <a onclick="return false">
                        <span class="currency1">{{ \Auth::user()->currentMoney }}</span>
                        <span> - </span>
                        <span class="currency2">{{ $data['secondaryCurrencyMoney'] }}</span>
                      </a>
                    </li>
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> {{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="/settings">Setting</a></li>
                            <li><a href="/logout">Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        </div>
        <div class="wrapper wrapper-content">
          @yield('content')
        </div>
        <div class="footer">
          <div class="pull-right">
              Save Your <strong>Money</strong> For <strong>Free.</strong>
          </div>
          <div>
              <strong>Copyright</strong> Vulooz &copy; 2015
          </div>
        </div>
      </div>
    </div>
    <!-- Mainly scripts -->
    <script src="{{ url('inspinia/js/jquery-2.1.1.js') }} "></script>
    <script src="{{ url('js/modernizr-1.7.min.js') }} "></script>
    <script src="{{ url('js/jquery.currency.js') }}"></script>
    <script src="{{ url('inspinia/js/bootstrap.min.js') }} "></script>
    <script src="{{ url('inspinia/js/plugins/metisMenu/jquery.metisMenu.js') }} "></script>
    <script src="{{ url('inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js') }} "></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ url('inspinia/js/inspinia.js') }} "></script>
    <script src="{{ url('inspinia/js/plugins/pace/pace.min.js') }} "></script>

    <!-- Flot -->
    <script src="{{ url('inspinia/js/plugins/flot/jquery.flot.js') }} "></script>
    <script src="{{ url('inspinia/js/plugins/flot/jquery.flot.tooltip.min.js') }} "></script>
    <script src="{{ url('inspinia/js/plugins/flot/jquery.flot.resize.js') }} "></script>

    <!-- ChartJS-->
    <script src="{{ url('inspinia/js/plugins/chartJs/Chart.min.js') }} "></script>
    <script src="{{ url('inspinia/js/plugins/chartJs/Chart.min.js') }} "></script>

    <!-- Peity -->
    <script src="{{ url('inspinia/js/plugins/peity/jquery.peity.min.js') }} "></script>
    <!-- Peity demo -->
    <script src="{{ url('inspinia/js/demo/peity-demo.js') }} "></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $(".currency1").currency({ region: '{{ \Auth::user()->mainCurrency }}', thousands: ".", decimal: ",", decimals: 0 });
        $(".currency2").currency({ region: '{{ \Auth::user()->secondaryCurrency }}', thousands: ".", decimal: ",", decimals: 0 });
    });
    </script>
    @yield('script')
</body>

</html>
