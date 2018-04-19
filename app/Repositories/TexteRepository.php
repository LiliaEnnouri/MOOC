<?php

namespace App\Repositories;

use App\Models\Texte;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TexteRepository
 * @package App\Repositories
 * @version April 19, 2018, 9:03 am UTC
 *
 * @method Texte findWithoutFail($id, $columns = ['*'])
 * @method Texte find($id, $columns = ['*'])
 * @method Texte first($columns = ['*'])
*/
class TexteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'cours_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Texte::class;
    }
}
