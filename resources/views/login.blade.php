<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Iniciar sesión</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href=" /css/login.css" rel="stylesheet" type="text/css"/>

    <!-- Google Fonts -->
    <link href='//fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
    <div class="row main">
        <div class="panel-heading">
            <div class="panel-title text-center">
                <h1 class="title">Iniciar sesión</h1>
                <hr />
            </div>
        </div>
        <div class="main-login main-center">
            <p id="alert">{{$error or ""}}</p>

            <form method="POST" action="/">
                <!--<input type="hidden" name="_token" value="{{-- csrf_token() --}}">-->

                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label">Usuario</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="username" id="username"  placeholder="Usuario" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Contraseña</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password" id="password"  placeholder="Contraseña" required/>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group ">
                    <button type="submit" class="btn btn-primary btn-block login-button">Aceptar</button>
                </div>
            </form>

        </div>
    </div>
</div>
</body>
</html>
