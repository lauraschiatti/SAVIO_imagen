@extends('base')

@section('title', 'Apps - Editar')

@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="page-header">
                <h1>Aplicaciones <small>/ Editar</small></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-area">
                    <form method="post" action="/apps/{{$app->id}}/update">
                        <div class="alert alert-danger" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only">Error:</span>
                            Enter a valid email address
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $app->name }}" required>
                        </div>

                        <div class="pull-right">
                            <button type="submit" class="btn btn-success" id="actualizar"> Actualizar </button>
                            <a href="/apps" class="btn btn-default" data-dismiss="modal">Atrás </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

