<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Video
 * @package App\Models
 * @version April 19, 2018, 9:04 am UTC
 *
 * @property \App\Models\Cours cours
 * @property string nom
 * @property string titre
 * @property string description
 * @property integer cours_id
 */
class Video extends Model
{
    use SoftDeletes;

    public $table = 'videos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nom',
        'titre',
        'description',
        'cours_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nom' => 'string',
        'titre' => 'string',
        'description' => 'string',
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
