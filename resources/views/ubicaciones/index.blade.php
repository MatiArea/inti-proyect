@extends('template.app')

@section('content')
    <main class="col-md-10 ms-sm-auto col-lg-12 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2>Ubicaciones</h2>
            <div class="d-flex justify-content-between align-items-center pb-2 mb-3">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal1">Cargar nueva Ubicacion
                    <span data-feather="plus"></span></button>
            </div>
            <!-- Modal 1 -->
            <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1Title"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal1Title">Nueva Ubicacion</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <form action="/ubicacion/store" method="POST">
                                @csrf
                                <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap ">
                                    <div class="form-group col-12 p-2">
                                        <input type="text" class="form-control" name="nombre_ubicacion"
                                            id="nombre_ubicacion" placeholder="Nombre de la ubicacion">
                                    </div>
                                </div>
                                <div class="modal-footer mt-4">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                        Cancelar
                                    </button>
                                    <button type="submit" class="btn btn-success">Agregar</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
            <!--Fin Modal 1 -->
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>

                        <th scope="col">Codigo identificatorio</th>
                        <th scope="col">Ubicacion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ubicaciones as $ubicacion)
                        <tr>
                            <td>{{ $ubicacion->ubicacion_id }}</td>
                            <td>{{ $ubicacion->nombre_ubicacion }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>




    </main>
@endsection
