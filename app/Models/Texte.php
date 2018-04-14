<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Texte extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'texte_id';
    protected $table = 'Texte';
    protected $fillable = ['nom', 'cours_id'];
    public $timestamps = true;
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function cours()
    {
        return $this->belongsTo('\app\Models\Cours', 'cours_id');
    }
}
