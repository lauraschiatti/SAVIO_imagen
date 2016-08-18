@extends('base')

@section('title', 'Apps - Crear')

@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="page-header">
                <h1>Aplicaciones <small>/ Crear</small></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-area">
                    <form method="post" action="/apps/store">

                        <!--<div class="alert alert-danger" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only">Error:</span>
                            Error
                        </div>-->

                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required>
                        </div>
                        {{--@if($app)
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $app->name }}" required>
                            </div>
                        @else
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required>
                            </div>
                        @endif--}}

                        <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
