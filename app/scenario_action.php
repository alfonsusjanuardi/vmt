<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class scenario_action extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'scenario_action';

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
    protected $fillable = ['id', 'actions_name', 'id_scenario', 'id_exercise', 'media_name', 'type'];    
}