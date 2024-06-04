<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exercise extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'exercise';

    /**
     * disable-model-timestamps: nambah kolom 'updated_at' dan 'created_at'
     */    
    public $timestamps = false;

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id_exercise';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_exercise', 'deskripsi', 'sejarah_pemakaian', 'sejarah_produksi', 'spesifikasi', 'kinerja', 'persenjataan', 'project_name', 'media_name', 'media_type'];    
}