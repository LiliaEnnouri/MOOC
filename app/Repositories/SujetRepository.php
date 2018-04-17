<?php

namespace App\Repositories;

use App\Auteur;
use App\Sujet;
use Illuminate\Http\Request;

class SujetRepository
{
    public function getAll()
    {
        return Sujet::get();
    }

}

