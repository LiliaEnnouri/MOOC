<?php

namespace App\Http\Controllers;

use App\Repositories\SujetRepository;
use Illuminate\Http\Request;

class SujetController extends Controller
{
     protected $sujetRepository;

    function __construct(SujetRepository $sujetRepository)
    {
        $this->sujetRepository = $sujetRepository;
    }

    public function getAll(){
        return $this->sujetRepository->getAll();
    }
}
