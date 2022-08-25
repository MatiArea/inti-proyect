@extends('template.app')

@section('content')
    <main class="col-md-10 ms-sm-auto col-lg-12 px-md-4">
        <!-- Modal 1 -->
        <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1Title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">

                        <form>
                            <h6 class="modal-title" id="modal1Title">Informacion centro de costo</h6>
                            <div class="d-flex flex-row  justify-content-between flex-wrap flex-md-nowrap pt-2">

                                <div class="form-group col-6 p-2">
                                    <input type="text" class="form-control" name="codigo"
                                        placeholder="Codigo del articulo">
                                    <div class="form-group col-3 p-1">
                                        <span class="p-2">
                                            Numero identificatorio
                                        </span>
                                        <span class="form-control mt-1">
                                            {{ $egreso->codigo }}
                                        </span>
                                    </div>

                                </div>
                                <div class="form-group col-6 p-2">
                                    <div class="form-group col-12">

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
                                    <div class="form-group col-12">

                                    </div>
                                </div>
                                <div class="form-group col-6 p-2">
                                    <div class="form-group">

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
