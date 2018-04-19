<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Texte
 * @package App\Models
 * @version April 19, 2018, 9:03 am UTC
 *
 * @property \App\Models\Cours cours
 * @property string nom
 * @property integer cours_id
 */
class Texte extends Model
{
    use SoftDeletes;

    public $table = 'textes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nom',
        'cours_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nom' => 'string',
        'cours_id' => 'integer'
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
    public function cours()
    {
        return $this->belongsTo(\App\Models\Cours::class);
    }
}
