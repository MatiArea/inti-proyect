@extends('template.app')

@section('content')
    <script>
        var items = [];
        var itemsDelete = []

        $(function() {
            $("#addStockForm").on("submit", function(e) { //id of form
                e.preventDefault();
                var action = $(this).attr("action"); //get submit action from form
                var method = $(this).attr("method"); // get submit method

                $.ajax({
                    url: action,
                    data: {
                        _token: $('input[name=_token]').val(),
                        fecha: $('#fecha').val(),
                        ubicacion_id: parseInt($('#ubicacion').val()),
                        responsable_id: $('#responsable').val() ? parseInt($('#responsable')
                            .val()) : null,
                        items: JSON.stringify(items)
                    },
                    type: method,
                    beforeSend: function(request) {
                        return request.setRequestHeader('X-CSRF-Token', $(
                            "meta[name='csrf-token']").attr('content'));
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            items = [];
                            $('#addStockForm')[0].reset();
                            window.location.href = "/";
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(result) {

                        console.log(result)

                    },

                })
            });
            $("#deleteStockForm").on("submit", function(e) { //id of form
                e.preventDefault();
                var action = $(this).attr("action"); //get submit action from form
                var method = $(this).attr("method"); // get submit method

                console.log($('#ubicacionDelete').val())
                var data = {
                    _token: $('input[name=_token]').val(),
                    fecha: $('#fechaDelete').val(),
                    ubicacion_id: parseInt($('#ubicacionDelete').val()),
                    responsable_id: $('#responsable').val() ? parseInt($('#responsableDelete')
                        .val()) : null,
                    items: JSON.stringify(itemsDelete)
                }

                console.log(data);

                $.ajax({
                    url: action,
                    data: {
                        _token: $('input[name=_token]').val(),
                        fecha: $('#fechaDelete').val(),
                        ubicacion_id: parseInt($('#ubicacionDelete').val()),
                        responsable_id: $('#responsable').val() ? parseInt($('#responsableDelete')
                            .val()) : null,
                        items: JSON.stringify(itemsDelete)
                    },
                    type: method,
                    beforeSend: function(request) {
                        return request.setRequestHeader('X-CSRF-Token', $(
                            "meta[name='csrf-token']").attr('content'));
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            itemsDelete = [];
                            $('#deleteStockForm')[0].reset();
                            // window.location.href = "/";
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(result) {

                        console.log(result)

                    },

                })
            });

        });

        function addItem() {
            var item = document.getElementById('selectItem').value;
            var quantity = document.getElementById('quantity').value;

            if (item != '' && quantity > 0) {
                console.log(item);
                var itemToSave = {
                    item: JSON.parse(item),
                    quantity: quantity
                };

                items.push(itemToSave);

                var fila = document.getElementById('dataTable').insertRow(0);
                var descripcion = fila.insertCell(0);
                var ubicacion = fila.insertCell(1);
                var cantidad = fila.insertCell(2);
                descripcion.innerHTML = itemToSave['item']['descripcion'];
                ubicacion.innerHTML = itemToSave['item']['nombre_ubicacion'];
                cantidad.innerHTML = quantity;

                $('#selectItem').prop('selectedIndex', 0);
                document.getElementById('quantity').value = 0;
            } else {
                alert('Debe seleccionar un item e ingresar una cantidad');
            }

        }

        function addItemDelete() {
            var item = document.getElementById('selectItemDelete').value;
            var quantity = document.getElementById('quantityDelete').value;

            if (item != '' && quantity > 0) {
                console.log(item);
                var itemToSave = {
                    item: JSON.parse(item),
                    quantity: quantity
                };

                itemsDelete.push(itemToSave);

                var fila = document.getElementById('dataTableDelete').insertRow(0);
                var descripcion = fila.insertCell(0);
                var ubicacion = fila.insertCell(1);
                var cantidad = fila.insertCell(2);
                descripcion.innerHTML = itemToSave['item']['descripcion'];
                ubicacion.innerHTML = itemToSave['item']['nombre_ubicacion'];
                cantidad.innerHTML = quantity;

                $('#selectItemDelete').prop('selectedIndex', 0);
                document.getElementById('quantityDelete').value = 0;
            } else {
                alert('Debe seleccionar un item e ingresar una cantidad');
            }

        }

        function addStock() {

        }
    </script>
    <main class="col-md-10 ms-sm-auto col-lg-12 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2>Control de Stock</h2>
        </div>
        <div class="d-flex justify-content-between align-items-center pb-2 mb-3">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal1">Cargar nuevo Item <span
                    data-feather="plus"></span></button>
            <div class="d-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-primary rounded-pill mx-4" data-toggle="modal"
                    data-target="#modal2">Agregar stock </span></button>
                <button type="button" class="btn btn-primary rounded-pill mx-4" data-toggle="modal"
                    data-target="#modal3">Entregar stock </span></button>
            </div>
        </div>
        <div
            class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom col-12">
            <div class="form-group col-4 p-2">
                <div class="form-group">
                    <select class="form-control" id="selectEstadoOblea" placeholcer="Estado oblea">
                        <option>Filtrar</option>
                        <option>Filtro 1</option>
                        <option>Filtro 2</option>
                        <option>Filtro 3</option>
                        <option>Filtro 4</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-4 p-2">
                <div class="form-group p-2">
                    <input type="text" class="form-control" id="nempresa" placeholder="Valor a filtrar">
                </div>
            </div>
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>

        <!-- Modal 1 -->
        <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1Title"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal1Title">Nuevo Item</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="/item/store" method="POST">
                            @csrf
                            <!-- Section 1 -->
                            <h6 class="modal-title" id="modal1Title">Informacion centro de costo</h6>
                            <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap pt-2">

                                <div class="form-group col-6 p-2">
                                    <input type="text" class="form-control" name="codigo"
                                        placeholder="Codigo del articulo">
                                </div>
                                <div class="form-group col-6 p-2">
                                    <div class="form-group col-12">
                                        <select class="form-control" name="tipo_producto" placeholcer="Ubicacion">
                                            <option value="0" disabled selected>Tipo de producto</option>
                                            @foreach ($tipos_productos as $tipoProducto)
                                                <option value="{{ $tipoProducto->id }}">
                                                    {{ $tipoProducto->nombre_tipo_producto }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-between flex-wrap flex-md-nowrap pt-2">
                                <div class="form-group col-12 p-2">
                                    <textarea class="form-control" name="descripcion" rows="3" placeholder="Descripcion del articulo"></textarea>
                                </div>
                            </div>
                            <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap pt-2">
                                <div class="form-group col-6 p-2">
                                    <div class="form-group">
                                        <select class="form-control" name="ubicacion" placeholcer="Ubicacion">
                                            <option value="0" disabled selected>Ubicacion</option>
                                            @foreach ($ubicaciones as $ubicacion)
                                                <option value="{{ $ubicacion->id }}">{{ $ubicacion->nombre_ubicacion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-6 p-2">
                                    <div class="form-group">
                                        <select class="form-control" name="responsable" placeholcer="Responsable">
                                            <option value="0" disabled selected>Responsable</option>
                                            @foreach ($responsables as $responsable)
                                                <option value="{{ $responsable->id }}">
                                                    {{ $responsable->nombreApellido }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <!-- Fin Section 1 -->

                            <!-- Section 6 -->
                            <h6 class="modal-title mt-2" id="modal1Title">Stock</h6>

                            <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap ">
                                <div class="form-group col-6 p-2">
                                    <input type="number" class="form-control" name="stockInicial"
                                        placeholder="Stock inicial">
                                </div>

                                <div class="form-group col-6 p-2">
                                    <input type="number" class="form-control" name="stockMinimo"
                                        placeholder="Stock minimo">
                                </div>
                            </div>


                            <!-- Fin Section 6 -->

                            <div class="form-group col-6 p-2">
                                <div class="form-group">
                                    <select class="form-control" name="inventariable" placeholcer="Responsable">
                                        <option value="0" disabled selected>Item Inventariable</option>
                                        <option value="1">Si</option>
                                        <option value="2">No</option>

                                    </select>
                                </div>
                            </div>

                            <div class="modal-footer my-2">
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

        <!-- Modal 2 -->
        <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal2Title"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal1Title">Agregar Stock</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <form method="POST" action="/stock/store" id="addStockForm">
                            @csrf
                            <!-- Section 1 -->
                            <h6 class="modal-title" id="modal2Title">Informacion centro de costo</h6>

                            <div class="form-group col-6 p-2">
                                <input type="datetime-local" class="form-control" name="fecha" id="fecha"
                                    placeholder="Cantidad">
                            </div>
                            <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap pt-2">

                                <div class="form-group col-6 p-2">
                                    <div class="form-group">
                                        <select class="form-control" name="ubicacion" id="ubicacion"
                                            placeholcer="Ubicacion">
                                            <option value="0" disabled selected>Ubicacion</option>
                                            @foreach ($ubicaciones as $ubicacion)
                                                <option value="{{ $ubicacion->ubicacion_id }}">
                                                    {{ $ubicacion->nombre_ubicacion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-6 p-2">
                                    <div class="form-group">
                                        <select class="form-control" name="responsable" id="responsable"
                                            placeholcer="Responsable">
                                            <option value="0" disabled selected>Responsable</option>
                                            @foreach ($responsables as $responsable)
                                                <option value="{{ $responsable->responsable_id }}">
                                                    {{ $responsable->nombreApellido }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap pt-2">

                                <div class="form-group col-8 p-2">
                                    <div class="form-group">
                                        <select class="form-control" id="selectItem" placeholcer="Item">
                                            <option value="0" selected disabled> Seleccione un item </option>
                                            @foreach ($items as $item)
                                                <option value="{{ $item }}">
                                                    {{ $item->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-3 p-2">
                                    <input type="number" class="form-control" id="quantity" placeholder="Cantidad"
                                        min="0">
                                </div>
                                <div class="form-group col-1 p-2">
                                    <button type="button"
                                        class="btn btn-success rounded-circle d-flex justify-content-center align-items-center"
                                        style="width: 40px;height: 40px;" onclick="addItem()"><span
                                            data-feather="plus"></span></button>
                                </div>

                            </div>

                            <!-- Fin Section 1 -->

                            <!-- Section 6 -->
                            <h6 class="modal-title mt-2" id="modal2Title">Stock</h6>

                            <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap ">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Producto</th>
                                            <th scope="col">Ubicacion</th>
                                            <th scope="col">Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dataTable">

                                    </tbody>

                                </table>
                            </div>


                            <!-- Fin Section 6 -->
                            <div class="modal-footer">
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
        <!--Fin Modal 2 -->

        <!-- Modal 3 -->
        <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="modal3Title"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal3Title">Entregar Stock</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <form method="POST" action="/stock/delete" id="deleteStockForm">
                            @csrf
                            <!-- Section 1 -->
                            <h6 class="modal-title" id="modal2Title">Informacion centro de costo</h6>

                            <div class="form-group col-6 p-2">
                                <input type="datetime-local" class="form-control" name="fechaDelete" id="fechaDelete"
                                    placeholder="Cantidad">
                            </div>
                            <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap pt-2">

                                <div class="form-group col-6 p-2">
                                    <div class="form-group">
                                        <select class="form-control" name="ubicacionDelete" id="ubicacionDelete"
                                            placeholcer="Ubicacion">
                                            <option value="0" disabled selected>Ubicacion</option>
                                            @foreach ($ubicaciones as $ubicacion)
                                                <option value="{{ $ubicacion->ubicacion_id }}">
                                                    {{ $ubicacion->nombre_ubicacion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-6 p-2">
                                    <div class="form-group">
                                        <select class="form-control" name="responsableDelete" id="responsableDelete"
                                            placeholcer="Responsable">
                                            <option value="0" disabled selected>Responsable</option>
                                            @foreach ($responsables as $responsable)
                                                <option value="{{ $responsable->responsable_id }}">
                                                    {{ $responsable->nombreApellido }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap pt-2">

                                <div class="form-group col-8 p-2">
                                    <div class="form-group">
                                        <select class="form-control" id="selectItemDelete" name="selectItemDelete"
                                            placeholcer="Item">
                                            <option value="0" selected disabled> Seleccione un item </option>
                                            @foreach ($items as $item)
                                                <option value="{{ $item }}">
                                                    {{ $item->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-3 p-2">
                                    <input type="number" class="form-control" id="quantityDelete"
                                        placeholder="Cantidad" min="0">
                                </div>
                                <div class="form-group col-1 p-2">
                                    <button type="button"
                                        class="btn btn-success rounded-circle d-flex justify-content-center align-items-center"
                                        style="width: 40px;height: 40px;" onclick="addItemDelete()"><span
                                            data-feather="plus"></span></button>
                                </div>

                            </div>

                            <!-- Fin Section 1 -->

                            <!-- Section 6 -->
                            <h6 class="modal-title mt-2" id="modal2Title">Stock</h6>

                            <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap ">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Producto</th>
                                            <th scope="col">Ubicacion</th>
                                            <th scope="col">Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dataTableDelete">

                                    </tbody>

                                </table>
                            </div>


                            <!-- Fin Section 6 -->
                            <div class="modal-footer">
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
        <!--Fin Modal 3 -->


        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>

                        <th scope="col">Codigo articulo</th>
                        <th scope="col">Tipo de producto</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Ubicacion</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Inventariable</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr class="py-2">
                            <td>{{ $item->codigo }}</td>
                            <td>{{ $item->nombre_tipo_producto }}</td>
                            <td>{{ $item->descripcion }}</td>
                            <td>{{ $item->nombre_ubicacion }}</td>
                            <td>{{ $item->stock }} </td>
                            @if ($item->inventariable == 1)
                                <td>Si</td>
                            @else
                                <td>No</td>
                            @endif
                            <td>
                                <i class="fa-solid fa-eye px-2"></i>
                                {{-- <i class="fa-solid fa-pencil px-2"></i> --}}
                                <i class="fa-solid fa-trash px-2"></i>
                            </td>
                        </tr>
                    @endforeach
                    {{-- <tr class="py-2">
                    <td>003C000107</td>
                    <td>Electricidad</td>

                    <td>Tapas punto y toma</td>
                    <td>Pañol Edif.Nº 31 INTI PTM</td>
                    <td>20 </td>
                    <td>
                        <i class="fa-solid fa-eye px-2"></i>
                        <i class="fa-solid fa-pencil px-2"></i>
                        <i class="fa-solid fa-trash px-2"></i>
                    </td>
                </tr>
                <tr class="py-2">
                    <td>003C000107</td>
                    <td>Electricidad</td>

                    <td>Protectores Oculares</td>
                    <td>Pañol Edif.Nº 31 INTI PTM</td>
                    <td>20</td>
                    <td>
                        <a href="/item/1">
                            <i class="fa-solid fa-eye px-2"></i>
                        </a>
                        <i class="fa-solid fa-pencil px-2"></i>
                        <i class="fa-solid fa-trash px-2"></i>
                    </td>
                </tr>
                <tr class="py-2">
                    <td>003C000107</td>
                    <td>Electricidad</td>
                    <td>Cascos Blancos</td>
                    <td>Pañol Edif.Nº 31 INTI PTM</td>
                    <td>20</td>
                    <td>
                        <i class="fa-solid fa-eye px-2"></i>
                        <i class="fa-solid fa-pencil px-2"></i>
                        <i class="fa-solid fa-trash px-2"></i>
                    </td>
                </tr> --}}

                </tbody>
            </table>
        </div>
        {{-- <nav class="mt-4">
            <ul class="pagination justify-content-center">
                <li class="page-item active" aria-current="page">
                    <span class="page-link">
                        1
                        <span class="sr-only">(current)</span>
                    </span>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
            </ul>
        </nav> --}}
    </main>
@endsection
