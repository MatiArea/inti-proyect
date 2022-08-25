@extends('template.app')

@section('content')
    <main class="col-md-10 ms-sm-auto col-lg-12 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2>Historial de entradas</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>

                        <th class="text-center" scope="col">Codigo identificatorio</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Ubicacion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ingresos as $entrada)
                        <tr>
                            <td class="text-center">{{ $entrada->id }}</td>
                            <td>{{ $entrada->fecha }}</td>
                            <td>{{ $entrada->nombre_ubicacion }}</td>
                            <td class="text-center">
                                {{-- <i class="fa-solid fa-eye px-2"></i> --}}
                                <a href="/stock/entradas/{{ $entrada->id }}" class=" rounded"><i
                                        class="fa-solid fa-eye px-2"></i></a>
                                {{-- <i class="fa-solid fa-pencil px-2"></i> --}}
                                {{-- <i class="fa-solid fa-trash px-2"></i> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>
@endsection
