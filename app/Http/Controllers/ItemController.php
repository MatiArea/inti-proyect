<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Responsable;
use App\Models\TipoProducto;
use App\Models\Ubicacion;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipos_productos = TipoProducto::all();
        $ubicaciones = Ubicacion::all();
        $responsables = Responsable::all();

        $items = Item::select('*')
            ->leftjoin('tipo_producto', 'item.tipo_producto_id', '=', 'tipo_producto.id')
            ->leftjoin('ubicacion', 'item.ubicacion_id', '=', 'ubicacion.ubicacion_id')
            ->get();


        return view('items.index', ['items' => $items, 'tipos_productos' => $tipos_productos, 'ubicaciones' => $ubicaciones, 'responsables' => $responsables]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $item = new Item;
        $item->codigo = $request->codigo;
        $item->descripcion = $request->descripcion;
        $item->tipo_producto_id = $request->tipo_producto;
        $item->ubicacion_id = $request->ubicacion;
        $item->responsable_id = $request->responsable;
        $item->stock = $request->stockInicial;
        $item->stock_minimo = $request->stockMinimo;
        $item->inventariable = $request->inventariable;
        $item->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
