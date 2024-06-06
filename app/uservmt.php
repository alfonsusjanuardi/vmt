<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class uservmt extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'uservmt';

    /**
     * disable-model-timestamps: nambah kolom 'updated_at' dan 'created_at'
     */    
    public $timestamps = false;

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'username';
    protected $keyType = 'string';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_user', 'name', 'username', 'password', 'id_exercise', 'scenario'];    
}