<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $item_id
 * @property string $codigo
 * @property string $descripcion
 * @property int $stock
 * @property int $ubicacion_id
 * @property int $tipo_producto_id
 * @property int $responsable_id
 */
class Item extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'item';
    public $timestamps = false;
    protected $primaryKey = 'item_id';

    /**
     * @var array
     */
    protected $fillable = ['codigo', 'descripcion', 'stock', 'ubicacion_id', 'tipo_producto_id', 'responsable_id', 'stock_minimo', 'inventariable'];
}
