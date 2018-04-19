<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cours
 * @package App\Models
 * @version April 19, 2018, 8:57 am UTC
 *
 * @property \App\Models\Auteur auteur
 * @property \App\Models\Sujet sujet
 * @property string label
 * @property string description
 * @property float nombre_heures
 * @property integer auteur_id
 * @property integer sujet_id
 */
class Cours extends Model
{
    use SoftDeletes;

    public $table = 'cours';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'label',
        'description',
        'nombre_heures',
        'auteur_id',
        'sujet_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'label' => 'string',
        'description' => 'string',
        'nombre_heures' => 'float',
        'auteur_id' => 'integer',
        'sujet_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function auteur()
    {
        return $this->belongsTo(\App\Models\Auteur::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sujet()
    {
        return $this->belongsTo(\App\Models\Sujet::class);
    }
}
