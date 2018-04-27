<?php

namespace App\Repositories;

use App\Models\Cours;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CoursRepository
 * @package App\Repositories
 * @version April 19, 2018, 8:57 am UTC
 *
 * @method Cours findWithoutFail($id, $columns = ['*'])
 * @method Cours find($id, $columns = ['*'])
 * @method Cours first($columns = ['*'])
*/
class CoursRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'label',
        'description',
        'nombre_heures',
        'auteur_id',
        'sujet_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cours::class;
    }

    public function all($columns = ['*'])
    {

        return Cours::with(['sujet','auteur'])->get();
    }
}
