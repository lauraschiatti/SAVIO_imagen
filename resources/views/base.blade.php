<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">-->
        <link href="/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">

        <!-- Google Fonts -->
        <link href='//fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

        <script src="/js/jquery-3.1.0.min.js" type="text/javascript"></script>
    </head>
    <body>

        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">SAVIO imagen</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <!--<li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Nav header</li>
                                <li><a href="#">Separated link</a></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>-->
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">
                                <i class="glyphicon glyphicon-log-out"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        @yield('content')

        <script src="/bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>