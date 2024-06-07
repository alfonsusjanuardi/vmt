<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class join_user extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'join_user';

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
    protected $fillable = ['id', 'username'];    
}