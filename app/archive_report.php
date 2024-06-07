<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class archive_report extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'archive_report';

    /**
     * disable-model-timestamps: nambah kolom 'updated_at' dan 'created_at'
     */    
    public $timestamps = false;

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id_report';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_report', 'student', 'instructor', 'scenario', 'id_exercise', 'duration', 'date_', 'status', 'trainingmode', 'exercisemode', 'id_action'];    
}