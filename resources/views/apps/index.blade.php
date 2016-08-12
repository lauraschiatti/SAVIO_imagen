@extends('base')

@section('title', 'Apps - Index')

@section('content')
    <style>
        .modal-vertical-centered {
            transform: translate(0, 50%) !important;
            -ms-transform: translate(0, 50%) !important; /* IE 9 */
            -webkit-transform: translate(0, 50%) !important; /* Safari and Chrome */
        }

        .modal-header {
            padding: 10px 23px;
            border-bottom: none;
        }

        .table{
            font-size: 110%;
        }
    </style>
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="page-header">
                <h1>Aplicaciones <small>/ Ver</small></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-md-offset-9">
                <a href="/apps/create" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- Table -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Hash</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($apps)
                                @foreach ($apps as $app)
                                    <tr>
                                        <td>{{ $app->id }}</td>
                                        <td>{{ $app->name }}</td>
                                        <td>{{ $app->hash }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-primary btn-xs" href="apps/{{$app->id}}/edit" ><span class="glyphicon glyphicon-pencil"></span></a>
                                            <button class="btn btn-danger btn-xs" onclick="showDeleteModal({{$app->id}});" ><span class="glyphicon glyphicon-trash"></span></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog modal-vertical-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger"><span class="glyphicon glyphicon-exclamation-sign"></span>  ¿Desea continuar?</div>
                </div>
                <div class="modal-footer">
                    <form method="post" id="deleteForm">
                        <button type="button" class="btn btn-success" id="aceptar">
                            <i class="glyphicon glyphicon-ok-sign"></i>
                            <span> Aceptar </span>
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <i class="glyphicon glyphicon-remove"></i>
                            <span> Cancelar </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var ID;
        /**** Eliminar usando modal ****/
        function showDeleteModal(id){
            ID = id
            $('#delete').modal();
        }

        $("#aceptar").click(function() {
            $('#deleteForm').attr('action', 'apps/'+ ID);
            $("#deleteForm").submit();
        });
    </script>
@stop
