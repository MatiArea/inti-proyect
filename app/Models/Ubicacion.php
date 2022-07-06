<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nombre
 */
class Ubicacion extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ubicacion';
    protected $primaryKey = 'ubicacion_id';
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['nombre'];
}
