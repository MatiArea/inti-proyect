<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nombre
 */
class TipoProducto extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tipo_producto';
	public $timestamps = false;


    /**
     * @var array
     */
    protected $fillable = ['nombre'];
}
