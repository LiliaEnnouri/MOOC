<?php

namespace App\Http\Controllers;

use App\Repositories\AuteurRepository;
use Illuminate\Http\Request;

class AuteurController extends Controller
{
    protected $auteurRepository;

    function __construct(AuteurRepository $auteurRepository)
    {
        $this->auteurRepository = $auteurRepository;
    }

    public function getAll(){
        return $this->auteurRepository->getAll();
    }
}
