<?php

namespace App\Repositories;

use App\Auteur;
use Illuminate\Http\Request;

class AuteurRepository
{
    public function getAll()
    {
        return Auteur::get();
    }

}

