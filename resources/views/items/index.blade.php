@extends('template.app')

@section('content')
<main class="col-md-10 ms-sm-auto col-lg-12 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Control de Stock</h2>
    </div>
    <div class="d-flex justify-content-between align-items-center pb-2 mb-3">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal1">Cargar nuevo Item <span data-feather="plus"></span></button>
        <div class="d-flex justify-content-between align-items-center">
            <button type="button" class="btn btn-primary rounded-pill mx-4" data-toggle="modal" data-target="#modal2">Agregar stock </span></button>
            <button type="button" class="btn btn-primary rounded-pill mx-4" data-toggle="modal" data-target="#modal3">Entregar stock </span></button>
        </div>
    </div>
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom col-12">
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
    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1Title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal1Title">Nuevo Item</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <form>
                        <!-- Section 1 -->
                        <h6 class="modal-title" id="modal1Title">Informacion centro de costo</h6>
                        <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap pt-2">

                            <div class="form-group col-6 p-2">
                                <input type="text" class="form-control" id="nempresa" placeholder="Codigo del articulo">
                            </div>
                            <div class="form-group col-6 p-2">
                                <input type="text" class="form-control" id="ncentrocosto" placeholder="Tipo de producto">
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between flex-wrap flex-md-nowrap pt-2">
                            <div class="form-group col-12 p-2">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Descripcion del articulo"></textarea>
                            </div>
                        </div>
                        <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap pt-2">
                            <div class="form-group col-12 p-2">
                                <div class="form-group">
                                    <select class="form-control" id="selectEstadoOblea" placeholcer="Ubicacion">
                                        <option>Ubicacion</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <!-- Fin Section 1 -->

                        <!-- Section 6 -->
                        <h6 class="modal-title mt-2" id="modal1Title">Stock</h6>

                        <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap ">
                            <div class="form-group col-6 p-2">
                                <input type="number" class="form-control" id="stockInicial" placeholder="Stock inicial">
                            </div>

                            <div class="form-group col-6 p-2">
                                <input type="number" class="form-control" id="stockInicial" placeholder="Stock minimo">
                            </div>
                        </div>


                        <!-- Fin Section 6 -->

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Fin Modal 1 -->

    <!-- Modal 2 -->
    <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal2Title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal1Title">Agregar Stock</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <form>
                        <!-- Section 1 -->
                        <h6 class="modal-title" id="modal2Title">Informacion centro de costo</h6>

                        <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap pt-2">

                            <div class="form-group col-8 p-2">
                                <div class="form-group">
                                    <select class="form-control" id="select" placeholcer="Item">
                                        <option>Item 1</option>
                                        <option>Item 2</option>
                                        <option>Item 3</option>
                                        <option>Item 4</option>
                                        <option>Item 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-3 p-2">
                                <input type="number" class="form-control" id="ncentrocosto" placeholder="Cantidad">
                            </div>
                            <div class="form-group col-1 p-2">
                                <button type="button" class="btn btn-success rounded-circle d-flex justify-content-center align-items-center" style="width: 40px;height: 40px;"><span data-feather="plus"></span></button>
                            </div>

                        </div>
                        <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap pt-2">

                            <div class="form-group col-12 p-2">
                                <div class="form-group">
                                    <select class="form-control" id="selectUbicacion" placeholcer="Ubicacion">
                                        <option>Ubicacion 1</option>
                                        <option>Ubicacion 2</option>
                                        <option>Ubicacion 3</option>
                                        <option>Ubicacion 4</option>
                                        <option>Ubicacion 5</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <!-- Fin Section 1 -->

                        <!-- Section 6 -->
                        <h6 class="modal-title mt-2" id="modal2Title">Stock</h6>

                        <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap ">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Codigo Producto</th>
                                        <th scope="col">Ubicacion</th>
                                        <th scope="col">Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">003C000107</th>
                                        <td>Pañol Edif.Nº 31 INTI PTM</td>
                                        <td>10</td>
                                        <td><i class="fa-solid fa-pencil px-2"></i>
                                            <i class="fa-solid fa-trash px-2"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">003C000107</th>
                                        <td>Pañol Edif.Nº 31 INTI PTM</td>
                                        <td>10</td>
                                        <td><i class="fa-solid fa-pencil px-2"></i>
                                            <i class="fa-solid fa-trash px-2"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">003C000107</th>
                                        <td>Pañol Edif.Nº 31 INTI PTM</td>
                                        <td>10</td>
                                        <td><i class="fa-solid fa-pencil px-2"></i>
                                            <i class="fa-solid fa-trash px-2"></i>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>


                        <!-- Fin Section 6 -->

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Fin Modal 2 -->

    <!-- Modal 3 -->
    <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="modal3Title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal3Title">Ingreso de Stock</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <form>
                        <!-- Section 1 -->
                        <h6 class="modal-title" id="modal2Title">Informacion centro de costo</h6>

                        <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap pt-2">

                            <div class="form-group col-8 p-2">
                                <div class="form-group">
                                    <select class="form-control" id="select" placeholcer="Item">
                                        <option>Item 1</option>
                                        <option>Item 2</option>
                                        <option>Item 3</option>
                                        <option>Item 4</option>
                                        <option>Item 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-3 p-2">
                                <input type="number" class="form-control" id="ncentrocosto" placeholder="Cantidad">
                            </div>
                            <div class="form-group col-1 p-2">
                                <button type="button" class="btn btn-success rounded-circle d-flex justify-content-center align-items-center" style="width: 40px;height: 40px;"><span data-feather="plus"></span></button>
                            </div>

                        </div>
                        <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap pt-2">

                            <div class="form-group col-12 p-2">
                                <input type="text" class="form-control" id="ncentrocosto" placeholder="Nombre del responsable">
                            </div>

                        </div>
                        <!-- Fin Section 1 -->

                        <!-- Section 6 -->
                        <h6 class="modal-title mt-2" id="modal2Title">Stock</h6>

                        <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap ">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Codigo Producto</th>
                                        <th scope="col">Ubicacion</th>
                                        <th scope="col">Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">003C000107</th>
                                        <td>Pañol Edif.Nº 31 INTI PTM</td>
                                        <td>10</td>
                                        <td><i class="fa-solid fa-pencil px-2"></i>
                                            <i class="fa-solid fa-trash px-2"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">003C000107</th>
                                        <td>Pañol Edif.Nº 31 INTI PTM</td>
                                        <td>10</td>
                                        <td><i class="fa-solid fa-pencil px-2"></i>
                                            <i class="fa-solid fa-trash px-2"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">003C000107</th>
                                        <td>Pañol Edif.Nº 31 INTI PTM</td>
                                        <td>10</td>
                                        <td><i class="fa-solid fa-pencil px-2"></i>
                                            <i class="fa-solid fa-trash px-2"></i>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>


                        <!-- Fin Section 6 -->

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-success">Agregar</button>
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
                </tr>
            </thead>
            <tbody>
                <tr class="py-2">
                    <td>003C000107</td>
                    <td>Electricidad</td>
                    <td>Protector Facial Antideflagracion</td>
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
                </tr>

            </tbody>
        </table>
    </div>
    <nav class="mt-4">
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
    </nav>
</main>

@endsection
