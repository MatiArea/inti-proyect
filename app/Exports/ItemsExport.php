<?php

namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ItemsExport implements
    FromCollection,
    WithHeadings,
    ShouldAutoSize,
    WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'Codigo',
            'Descripción',
            'Tipo de producto',
            'Ubicacion',
            'Stock',
            'Inventariable',
            'Responsable',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1 => ['font' => ['bold' => true, 'size' => 14]],
        ];
    }

    public function collection()
    {
        $items = Item::with([
            'responsable:responsable_id,nombreApellido',
            'tipoProducto:id,nombre_tipo_producto',
            'ubicacion:ubicacion_id,nombre_ubicacion',
        ])
            ->where('baja', '=', 0)
            ->select(
                'codigo',
                'descripcion',
                'stock',
                'ubicacion_id',
                'tipo_producto_id',
                'inventariable',
                'responsable_id'
                // 'tipo_producto.nombre_tipo_producto',
                // 'ubicacion.nombre_ubicacion'
            )
            ->get();

        $items->transform(function ($item) {
            return [
                'codigo' => $item->codigo,
                'descripcion' => $item->descripcion,
                'tipo_producto' => $item->tipoProducto
                    ? $item->tipoProducto->nombre_tipo_producto
                    : '-',
                'ubicacion' => $item->ubicacion
                    ? $item->ubicacion->nombre_ubicacion
                    : '-',
                'stock' => $item->stock,
                'inventariable' => $item->inventariable == 1 ? 'Si' : 'No',
                'responsable' => $item->responsable
                    ? $item->responsable->nombreApellido
                    : '-',
            ];
        });

        return $items;
    }
}
