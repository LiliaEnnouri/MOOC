<?php

namespace App\Repositories;

use App\Models\Video;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VideoRepository
 * @package App\Repositories
 * @version April 19, 2018, 9:04 am UTC
 *
 * @method Video findWithoutFail($id, $columns = ['*'])
 * @method Video find($id, $columns = ['*'])
 * @method Video first($columns = ['*'])
*/
class VideoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'titre',
        'description',
        'cours_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Video::class;
    }
}
