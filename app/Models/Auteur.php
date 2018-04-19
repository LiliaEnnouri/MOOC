<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Auteur
 * @package App\Models
 * @version April 19, 2018, 7:06 am UTC
 *
 * @property string nom
 * @property string prenom
 * @property string description
 */
class Auteur extends Model
{
    use SoftDeletes;

    public $table = 'auteurs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nom',
        'prenom',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nom' => 'string',
        'prenom' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
