<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class testingvmt extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'testingvmt';

    /**
     * disable-model-timestamps: nambah kolom 'updated_at' dan 'created_at'
     */    
    public $timestamps = false;

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'action', 'id_exercise', 'id_report'];    
}