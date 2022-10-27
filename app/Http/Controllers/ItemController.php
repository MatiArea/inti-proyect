<?php

namespace App\Http\Controllers;

use App\Exports\ItemsExport;
use App\Models\Area;
use App\Models\Item;
use App\Models\Ubicacion;
use App\Models\Responsable;
use App\Models\TipoProducto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use function PHPUnit\Framework\returnSelf;

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
        $areas = Area::all();

        $items = Item::select('*')
            ->leftjoin(
                'tipo_producto',
                'item.tipo_producto_id',
                '=',
                'tipo_producto.id'
            )
            ->leftjoin(
                'ubicacion',
                'item.ubicacion_id',
                '=',
                'ubicacion.ubicacion_id'
            )
            ->where('item.baja', '=', 0)
            ->get();

        return view('items.index', [
            'items' => $items,
            'tipos_productos' => $tipos_productos,
            'ubicaciones' => $ubicaciones,
            'responsables' => $responsables,
            'areas' => $areas,
        ]);
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
        $item = new Item();
        $item->codigo = $request->codigo;
        $item->descripcion = $request->descripcion;
        $item->tipo_producto_id = $request->tipo_producto;
        $item->ubicacion_id = $request->ubicacion_id;
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
        $item = Item::where('item_id', '=', $id)->first();
        $item->update(['baja' => 1]);
        $item->save();

        if ($item) {
            return response()->json(['success' => true, 'message' => $item]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function export()
    {
        return Excel::download(
            new ItemsExport(),
            'items-' . Carbon::today()->toDateString() . '.xlsx'
        );
    }
}
