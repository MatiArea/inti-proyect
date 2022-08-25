<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingreso;
use App\Models\ItemIngreso;
use App\Models\Item;

use PDF;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ingresos = Ingreso::select('*')
            ->leftjoin('ubicacion', 'ingreso.ubicacion_id', '=', 'ubicacion.ubicacion_id')
            ->leftjoin('responsable', 'ingreso.responsable_id', '=', 'responsable.responsable_id')
            ->get();

        return view('tables.entradas', compact('ingresos'));
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
        try {

            $ingreso = new Ingreso;
            $ingreso->fecha = $request->fecha;
            $ingreso->ubicacion_id = (int)$request->ubicacion_id;
            $ingreso->responsable_id = $request->responsable_id;
            $new_ingreso = $ingreso->save();

            if ($new_ingreso) {
                $items = json_decode($request->items);
                foreach ($items as $item) {
                    $item_data = $item->item;
                    // $value = $item['item'];

                    $item_ingreso = new ItemIngreso;
                    $item_ingreso->ingreso_id = $ingreso->id;
                    $item_ingreso->item_id = (int)$item_data->item_id;
                    $item_ingreso->cantidad = (int)$item->quantity;
                    $new_item_ingreso = $item_ingreso->save();

                    if ($new_item_ingreso) {
                        $item_to_update = Item::find($item_data->item_id);
                        $stock = $item_to_update->stock + (int) $item->quantity;
                        $item_to_update->update(['stock' => $stock]);
                    }
                }
                return response()->json(['success' => true, 'message' => 'Error al registrar ingreso.']);
            } else {
                return response()->json(['success' => false, 'message' => 'Error al registrar ingreso.']);
            }


            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
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
        $ingreso = Ingreso::select('*')
            ->join('responsable', 'ingreso.responsable_id', '=', 'responsable.responsable_id')
            ->join('ubicacion', 'ingreso.ubicacion_id', '=', 'responsable.ubicacion_id')
            ->where('id', $id)
            ->first();

        $items = ItemIngreso::select('*')
            ->join('item', 'item_ingreso.item_id', '=', 'item.item_id')
            ->where('ingreso_id', $id)
            ->get();

        return view('ingresos.index', compact('ingreso', 'items'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request)
    {

        $id = $request->id;

        $ingreso = Ingreso::select('*')
            ->join('responsable', 'ingreso.responsable_id', '=', 'responsable.responsable_id')
            ->join('ubicacion', 'ingreso.ubicacion_id', '=', 'responsable.ubicacion_id')
            ->where('id', $id)
            ->first();

        $items = ItemIngreso::select('*')
            ->join('item', 'item_ingreso.item_id', '=', 'item.item_id')
            ->where('ingreso_id', $id)
            ->get();

        $pdf = PDF::loadView('template.pdf_ingresos', compact('ingreso', 'items'));
        $pdf_name = 'ingreso_' . $id . '_fecha_' . $ingreso->fecha . '.pdf';

        return $pdf->download($pdf_name);

        // return view('salidas.index', compact('egreso', 'items'));
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
