<?php

namespace App\Repositories;

use App\Models\Auteur;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AuteurRepository
 * @package App\Repositories
 * @version April 19, 2018, 7:06 am UTC
 *
 * @method Auteur findWithoutFail($id, $columns = ['*'])
 * @method Auteur find($id, $columns = ['*'])
 * @method Auteur first($columns = ['*'])
*/
class AuteurRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'prenom',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Auteur::class;
    }
}
