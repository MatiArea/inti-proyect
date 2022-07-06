<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $fecha
 * @property int $ubicacion_id
 * @property int $responsable_id
 */
class Ingreso extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ingreso';
	public $timestamps = false;


    /**
     * @var array
     */
    protected $fillable = ['fecha', 'ubicacion_id', 'responsable_id'];
}
