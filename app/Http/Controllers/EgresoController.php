<?php

namespace App\Http\Controllers;

use App\Models\Area;
use PDF;
use Image;
use App\Models\Item;
use App\Models\Egreso;
use App\Models\ItemEgreso;
use Illuminate\Http\Request;
use App\Models\Image as Logo;

class EgresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $egresos = Egreso::select('*')
            ->join(
                'responsable',
                'egreso.responsable_id',
                '=',
                'responsable.responsable_id'
            )
            ->get();

        return view('tables.salidas', compact('egresos'));
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
            $egreso = new egreso();
            $egreso->fecha = $request->fecha;
            $egreso->nombre_receptor = $request->nombre_receptor;
            $egreso->ubicacion_id = (int) $request->ubicacion_id;
            $egreso->responsable_id = $request->responsable_id;
            $egreso->area_receptor_id = $request->area_receptor_id;
            $new_egreso = $egreso->save();

            if ($new_egreso) {
                $items = json_decode($request->items);
                foreach ($items as $item) {
                    $item_data = $item->item;
                    // $value = $item['item'];

                    $item_egreso = new ItemEgreso();
                    $item_egreso->egreso_id = $egreso->id;
                    $item_egreso->item_id = (int) $item_data->item_id;
                    $item_egreso->cantidad = (int) $item->quantity;
                    $new_item_egreso = $item_egreso->save();

                    if ($new_item_egreso) {
                        $item_to_update = Item::find($item_data->item_id);
                        $stock = $item_to_update->stock - (int) $item->quantity;
                        $item_to_update->update(['stock' => $stock]);
                    }
                }
                return response()->json([
                    'success' => true,
                    'message' => 'Error al registrar egreso.',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al registrar egreso.',
                ]);
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
        $egreso = Egreso::select('*')
            ->join(
                'responsable',
                'egreso.responsable_id',
                '=',
                'responsable.responsable_id'
            )
            ->join(
                'ubicacion',
                'egreso.ubicacion_id',
                '=',
                'responsable.ubicacion_id'
            )
            ->where('id', $id)
            ->first();

        $items = ItemEgreso::select('*')
            ->join('item', 'item_egreso.item_id', '=', 'item.item_id')
            ->where('egreso_id', $id)
            ->get();

        return view('salidas.index', compact('egreso', 'items'));
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

        $egreso = Egreso::with(['responsable', 'ubicacion', 'area'])
            ->where('id', $id)
            ->first();

        $items = ItemEgreso::with(['item'])
            ->where('egreso_id', $id)
            ->get();

        // $logo = Logo::where('images_baja', 0)->first();

        $pdf = PDF::loadView('template.pdf_egresos', [
            'success' => true,
            'egreso' => $egreso,
            'items' => $items,
            // 'logo' => $logo,
        ]);

        $pdf_name = 'egreso_' . $id . '_fecha_' . $egreso->fecha . '.pdf';

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
