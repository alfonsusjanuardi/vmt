<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class scenario extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'scenario';

    /**
     * disable-model-timestamps: nambah kolom 'updated_at' dan 'created_at'
     */    
    public $timestamps = false;

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id_scenario';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_scenario', 'scenario_name', 'id_exercise'];    
}