@extends('base')

@section('title', 'Apps')

@section('content')
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
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($apps)
                                @foreach ($apps as $app)
                                    <tr>
                                        <td>{{ $app->id }}</td>
                                        <td>{{ $app->name }}</td>
                                        <td>{{ $app->hash }}</td>
                                        <td>
                                            <span class="glyphicon glyphicon-pencil text-success" aria-hidden="true"></span>
                                            <span class="glyphicon glyphicon-trash text-danger" aria-hidden="true"></span>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-lg" id="myBtn">Open Modal</button>

                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                            </div>
                            <div class="modal-body">
                                <p>Some text in the modal.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#myBtn").click(function(){
                $("#myModal").modal();
            });
        });
    </script>
@stop
