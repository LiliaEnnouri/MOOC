<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'image_id';
    protected $table = 'Image';
    protected $fillable = ['nom', 'is_profile', 'cours_id'];
    public $timestamps = true;
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function cours()
    {
        return $this->belongsTo('\app\Models\Cours', 'cours_id');
    }
}
