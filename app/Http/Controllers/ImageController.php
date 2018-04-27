<?php

namespace App\Http\Controllers;

use App\Repositories\ImageRepository;
use Illuminate\Http\Request;
use \Unisharp\FileApi\FileApi;

class ImageController extends Controller
{
    protected $imageRepository;

    function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function getAll(){
        return $this->imageRepository->getAll();
    }
    
    //Uploading single picture
    public function uploadImage(Request $request)
    {


        $this->validate($request, [
            'file_data' => 'image|required'
        ]);
        $fa_cours = new FileApi('/images/cours/'); # initiate another instance
        $image_nom = 'image_' . uniqid() . "." . $request->file('image');

        $file = $fa_cours->save($request->file('image'),$image_nom); // => wfj412.jpg

        return response()->json(["image" => $image_nom], 200);
    }

    //Adding a picture
    public function addImage(Request $request)
    {
        $this->validate($request, [
            'image_id' => 'required',
            'nom' => 'required',
            'cours_id' => 'required'
        ]);

        if (!$image = $this->imageRepository->addImage($request)) {
            if ($this->deleteImage($request->get('image_nom'))->getStatusCode() == 401)
                return response()->json(["error" => "cannot add picture and cannot delete it"], 401);
            return response()->json(["error" => "cannot add image"], 401);
        }
        return response()->json($image);
    }

    private function deleteImage($image_nom)
    {
        if ($this->imageRepository->deleteImage($image_nom) == 0)
            return response()->json(["failure" => "image has not been deleted successfully", "image_nom" => $image_nom], 401);
        else {
            return response()->json(['success' => 'image Have been deleted successfully.', 'image_nom' => $image_nom]);

        }
    }
}
