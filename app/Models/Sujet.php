<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sujet extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'sujet_id';
    protected $table = 'Sujet';
    protected $fillable = ['label','description'];
    public $timestamps = true;
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function cours()
    {
        return $this->hasMany('\app\Models\Cours','cours_id','cours_id');
    }
}
