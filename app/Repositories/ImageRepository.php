<?php

namespace App\Repositories;

use App\Auteur;
use App\Image;
use Illuminate\Http\Request;

class ImageRepository
{
    public function getAll()
    {
        return Image::get();
    }

    public function addImage(Request $request)
    {
        //Create an object
        $image = new Image();
        //Filling the attributes
        $image->image_id = $request->input("image_id");
        $image->nom = $request->input("nom");
        $image->is_profile = $request->input("cours_id");
        $image->save();
        return $image;
    }

}

