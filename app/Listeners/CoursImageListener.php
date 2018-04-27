<?php

namespace App\Listeners;

use App\Models\Image;

class CoursImageListener
{

    public function handle($param, $filename, $path)
    {
        $image =  new Image();
        $image->nom = $filename;
    }
}