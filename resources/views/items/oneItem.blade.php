@extends('template.app')

@section('content')
<main class="col-md-10 ms-sm-auto col-lg-12 px-md-4">
    <!-- Modal 1 -->
    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1Title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <form>
                        <!-- Section 1 -->
                        <h6 class="modal-title" id="modal1Title">Informacion centro de costo</h6>
                        <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap pt-2">

                            <div class="form-group col-6 p-2">
                                <input type="number" class="form-control" id="nempresa" placeholder="Numero de empresa">
                            </div>
                            <div class="form-group col-6 p-2">
                                <input type="number" class="form-control" id="ncentrocosto" placeholder="Numero de centro de costo">
                            </div>
                        </div>
                        <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap pt-2">
                            <div class="form-group col-6 p-2">
                                <input type="number" class="form-control" id="nempresa" placeholder="Numero de empresa">
                            </div>
                            <div class="form-group col-6 p-2">
                                <input type="password" class="form-control" id="ncentrocosto" placeholder="Numero de centro de costo nivel Subgerencia">
                            </div>
                        </div>
                        <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap pt-2 pb-2 mb-3 border-bottom">
                            <div class="form-group col-12 p-2">
                                <input type="text" class="form-control" id="nempresa" placeholder="Nombre centro de costo">
                            </div>
                        </div>
                        <!-- Fin Section 1 -->
                        <!-- Section 2 -->
                        <h6 class="modal-title" id="modal1Title">Informacion inventarial</h6>

                        <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap pt-2">
                            <div class="form-group col-6 p-2">
                                <input type="number" class="form-control" id="nempresa" placeholder="Numero de inventario">
                            </div>
                            <div class="form-group col-6 p-2">
                                <input type="number" class="form-control" id="ncentrocosto" placeholder="Numero anterior">
                            </div>
                        </div>
                        <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap pt-2">
                            <div class="form-group col-6 p-2">
                                <input type="text" class="form-control" id="nempresa" placeholder="Documento Responsable">
                            </div>
                            <div class="form-group col-6 p-2">
                                <div class="form-group">
                                    <select class="form-control" id="selectEstadoOblea" placeholcer="Estado oblea">
                                        <option>Estado Oblea</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap pt-2 pb-2 mb-3 border-bottom">
                            <div class="form-group col-12 p-2">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Observaciones de imposibilidad de pegado"></textarea>
                            </div>
                        </div>
                        <!-- Fin Section 2 -->

                        <!-- Section 3 -->
                        <h6 class="modal-title" id="modal1Title">Informacion del bien</h6>

                        <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap pt-2">
                            <div class="form-group col-6 p-2">
                                <input type="number" class="form-control" id="nempresa" placeholder="Codigo de catalogo">
                            </div>
                            <div class="form-group col-6 p-2">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Descripcion del catalogo"></textarea>
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between flex-wrap flex-md-nowrap pt-2">
                            <div class="form-group col-12 p-2">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Descripcion del bien"></textarea>
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between flex-wrap flex-md-nowrap pt-2 pb-2 mb-3 border-bottom">
                            <div class="form-group col-6 p-2">
                                <input type="text" class="form-control" id="modelo" placeholder="Modelo">
                            </div>
                            <div class="form-group col-6 p-2">
                                <input type="text" class="form-control" id="numeroSerie" placeholder="Numero serie">
                            </div>
                        </div>

                        <!-- Fin Section 3 -->

                        <!-- Section 4 -->
                        <h6 class="modal-title" id="modal1Title">Ubicacion</h6>

                        <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap pt-2">
                            <div class="form-group col-12 p-2">
                                <input type="text" class="form-control" id="numeroSerie" placeholder="Nombre de Sede">
                            </div>
                        </div>

                        <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap pt-2">
                            <div class="form-group col-6 p-2">
                                <input type="text" class="form-control" id="numeroSerie" placeholder="Domicilio">
                            </div>
                            <div class="form-group col-6 p-2">
                                <input type="text" class="form-control" id="numeroSerie" placeholder="Localidad">
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between flex-wrap flex-md-nowrap pt-2 pb-2 mb-3 border-bottom">
                            <div class="form-group col-6 p-2">
                                <input type="text" class="form-control" id="modelo" placeholder="Provincia">
                            </div>
                            <div class="form-group col-6 p-2">
                                <input type="number" class="form-control" id="numeroSerie" placeholder="Codigo postal">
                            </div>
                        </div>

                        <!-- Fin Section 4 -->

                        <!-- Section 5 -->
                        <h6 class="modal-title" id="modal1Title">Responsable</h6>

                        <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap pb-2 mb-3 border-bottom">
                            <div class="form-group col-6 p-2">
                                <input type="text" class="form-control" id="numeroSerie" placeholder="Legajo Responsable">
                            </div>
                            <div class="form-group col-6 p-2">
                                <input type="text" class="form-control" id="numeroSerie" placeholder="Responsable Patrimonial">
                            </div>
                        </div>


                        <!-- Fin Section 5 -->

                        <!-- Section 6 -->
                        <h6 class="modal-title" id="modal1Title">Stock</h6>

                        <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap ">
                            <div class="d-flex justify-content-center align-items-center form-group col-6 p-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Item stockeable</label>
                                </div>
                            </div>

                            <div class="form-group col-6 p-2">
                                <input type="number" class="form-control" id="stockInicial" placeholder="Stock inicial">
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

</main>

@endsection
