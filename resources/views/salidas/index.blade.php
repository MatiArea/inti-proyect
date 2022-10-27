@extends('template.app')

@section('content')
    <div class="modal-header">
        <h5 class="modal-title" id="modalData">Entrega detalle</h5>
    </div>

    <div class="modal-body">

        <form method="POST" action="/stock/salidas/descarga">
            @csrf
            <!-- Section 1 -->
            <h6 class="modal-title" id="modalData">Informacion </h6>

            <div class="d-flex flex-row justify-content-between flex-wrap flex-md-nowrap p-4">

                <input type="number" name="id" id="id" value="{{ $egreso->id }}" hidden>
                <div class="form-group col-3 p-1">
                    <span class="p-2">
                        Numero identificatorio
                    </span>
                    <span class="form-control mt-1">
                        {{ $egreso->id }}
                    </span>
                </div>

                <div class="form-group col-3 p-1">
                    <span class="p-2">
                        Fecha
                    </span>
                    <span class="form-control mt-1">
                        {{ $egreso->fecha }}
                    </span>
                </div>

                <div class="form-group col-3 p-1">
                    <span class="p-2">
                        Ubicacion
                    </span>
                    <span class="form-control mt-1">
                        {{ $egreso->nombre_ubicacion }}
                    </span>
                </div>

                <div class="form-group col-3 p-1">
                    <span class="p-2">
                        Responsable
                    </span>
                    <span class="form-control mt-1">
                        {{ $egreso->nombreApellido }}
                    </span>
                </div>


            </div>

            <!-- Fin Section 1 -->

            <!-- Section 6 -->
            <h6 class="modal-title mt-2" id="modalData">Stock</h6>

            <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap ">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Codigo Producto</th>
                            <th scope="col">Nombre</th>
                            <th scope="col" class="text-center">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->descripcion }}</td>
                                <td class="text-center">{{ $item->cantidad }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>


            <!-- Fin Section 6 -->

            <div class="modal-footer mt-5">
                <a href="/stock/salidas" class="rounded">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Volver
                    </button>
                </a>
                <button type="submit" class="btn btn-success">Descargar PDF</button>
            </div>
        </form>


    </div>
@endsection
