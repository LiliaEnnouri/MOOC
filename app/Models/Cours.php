<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cours extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'cours_id';
    protected $table = 'Cours';
    protected $fillable = ['label', 'description','nombre_heures','auteur_id', 'sujet_id'];
    public $timestamps = true;
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function images()
    {
    return $this->hasMany('\app\Models\Image','image_id','image_id');
    }
    public function textes()
    {
        return $this->hasMany('\app\Models\Texte','texte_id','texte_id');
    }
    public function videos()
    {
    return $this->hasMany('\app\Models\Video','video_id','video_id');
    }

    public function auteur()
    {
        return $this->belongsTo('\app\Models\Auteur', 'auteur_id');
    }

    public function sujet()
    {
        return $this->belongsTo('\app\Models\Sujet', 'sujet_id');
    }
}
