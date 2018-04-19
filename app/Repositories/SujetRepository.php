<?php

namespace App\Repositories;

use App\Models\Sujet;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SujetRepository
 * @package App\Repositories
 * @version April 19, 2018, 8:46 am UTC
 *
 * @method Sujet findWithoutFail($id, $columns = ['*'])
 * @method Sujet find($id, $columns = ['*'])
 * @method Sujet first($columns = ['*'])
*/
class SujetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'label'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Sujet::class;
    }
}
