<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $ingreso_id
 * @property int $item_id
 * @property int $cantidad
 */
class ItemIngreso extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'item_ingreso';
	public $timestamps = false;


    /**
     * @var array
     */
    protected $fillable = ['ingreso_id', 'item_id', 'cantidad'];
}
