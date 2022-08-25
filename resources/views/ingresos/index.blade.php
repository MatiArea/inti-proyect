@extends('template.app')

@section('content')
    <div class="modal-header">
        <h5 class="modal-title" id="modalData">Ingreso detalle</h5>
    </div>

    <div class="modal-body">

        <form method="POST" action="/stock/entradas/descarga">
            @csrf
            <!-- Section 1 -->
            <h6 class="modal-title" id="modalData">Informacion </h6>

            <div class="d-flex flex-row justify-content-between flex-wrap flex-md-nowrap p-4">

                <input type="number" id="ncentrocosto" name="id" id="id" value="{{ $ingreso->id }}" hidden>
                <div class="form-group col-3 p-1">
                    <span class="p-2">
                        Numero identificatorio
                    </span>
                    <span class="form-control mt-1">
                        {{ $ingreso->id }}
                    </span>
                </div>

                <div class="form-group col-3 p-1">
                    <span class="p-2">
                        Fecha
                    </span>
                    <span class="form-control mt-1">
                        {{ $ingreso->fecha }}
                    </span>
                </div>



                <div class="form-group col-3 p-1">
                    <span class="p-2">
                        Ubicacion
                    </span>
                    <span class="form-control mt-1">
                        {{ $ingreso->nombre_ubicacion }}
                    </span>
                </div>

                <div class="form-group col-3 p-1">
                    <span class="p-2">
                        Responsable
                    </span>
                    <span class="form-control mt-1">
                        {{ $ingreso->nombreApellido }}
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
                <a href="/stock/entradas" class="rounded">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Volver
                    </button>
                </a>
                <button type="submit" class="btn btn-success">Descargar PDF</button>
            </div>
        </form>


    </div>
@endsection
