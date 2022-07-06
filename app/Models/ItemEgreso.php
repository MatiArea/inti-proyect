<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $item_id
 * @property int $egreso_id
 * @property int $cantidad
 */
class ItemEgreso extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'item_egreso';
	public $timestamps = false;


    /**
     * @var array
     */
    protected $fillable = ['item_id', 'egreso_id', 'cantidad'];
}
