<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'video_id';
    protected $table = 'Video';
    protected $fillable = ['nom','titre','description', 'cours_id'];
    public $timestamps = true;
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function cours()
    {
        return $this->belongsTo('\app\Models\Cours', 'cours_id');
    }
}
