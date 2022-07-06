<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nombre
 * @property int $ubicacion_id
 */
class Responsable extends Model
{
    public $timestamps = false;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'responsable';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'responsable_id';

    /**
     * @var array
     */
    protected $fillable = ['nombreApellido', 'ubicacion_id'];
}
