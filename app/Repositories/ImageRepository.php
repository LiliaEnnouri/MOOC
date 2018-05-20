<?php

namespace App\Repositories;

use App\Models\Image;
use Illuminate\Http\Request;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ImageRepository
 * @package App\Repositories
 * @version April 19, 2018, 9:01 am UTC
 *
 * @method Image findWithoutFail($id, $columns = ['*'])
 * @method Image find($id, $columns = ['*'])
 * @method Image first($columns = ['*'])
*/
class ImageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'is_profile',
        'cours_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Image::class;
    }


    public function addImage($image_name, $cours_id, $is_profile)
    {
        //Create an object
        $picture = new Image();
        //Filling the attributes
        $picture->cours_id = $cours_id;
        $picture->nom = $image_name;
        $picture->is_profile = $is_profile;
        $picture->save();
        return $picture;
    }

}
