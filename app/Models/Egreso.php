<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $fecha
 * @property int $responsable_id
 */
class Egreso extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'egreso';
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'fecha',
        'nombre_receptor',
        'responsable_id',
        'ubicacion_id',
        'area_receptor_id',
    ];
}
