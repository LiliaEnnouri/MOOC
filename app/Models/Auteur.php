<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auteur extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'auteur_id';
    protected $table = 'Auteur';
    protected $fillable = ['nom', 'prenom', 'description'];
    public $timestamps = true;
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function cours()
    {
        return $this->hasMany('\app\Models\Cours','cours_id','cours_id');
    }

}
