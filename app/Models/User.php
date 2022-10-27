<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 */
class User extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'user';

    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql';
}
