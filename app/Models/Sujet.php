<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sujet
 * @package App\Models
 * @version April 19, 2018, 8:46 am UTC
 *
 * @property string label
 */
class Sujet extends Model
{
    use SoftDeletes;

    public $table = 'sujets';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'label'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'label' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'label' => 'description string text'
    ];

    
}
