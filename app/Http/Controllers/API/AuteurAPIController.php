<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAuteurAPIRequest;
use App\Http\Requests\API\UpdateAuteurAPIRequest;
use App\Models\Auteur;
use App\Repositories\AuteurRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AuteurController
 * @package App\Http\Controllers\API
 */

class AuteurAPIController extends AppBaseController
{
    /** @var  AuteurRepository */
    private $auteurRepository;

    public function __construct(AuteurRepository $auteurRepo)
    {
        $this->auteurRepository = $auteurRepo;
    }

    /**
     * Display a listing of the Auteur.
     * GET|HEAD /auteurs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->auteurRepository->pushCriteria(new RequestCriteria($request));
        $this->auteurRepository->pushCriteria(new LimitOffsetCriteria($request));
        $auteurs = $this->auteurRepository->all();

        return $this->sendResponse($auteurs->toArray(), 'Auteurs retrieved successfully');
    }

    /**
     * Store a newly created Auteur in storage.
     * POST /auteurs
     *
     * @param CreateAuteurAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAuteurAPIRequest $request)
    {
        $input = $request->all();

        $auteurs = $this->auteurRepository->create($input);

        return $this->sendResponse($auteurs->toArray(), 'Auteur saved successfully');
    }

    /**
     * Display the specified Auteur.
     * GET|HEAD /auteurs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Auteur $auteur */
        $auteur = $this->auteurRepository->findWithoutFail($id);

        if (empty($auteur)) {
            return $this->sendError('Auteur not found');
        }

        return $this->sendResponse($auteur->toArray(), 'Auteur retrieved successfully');
    }

    /**
     * Update the specified Auteur in storage.
     * PUT/PATCH /auteurs/{id}
     *
     * @param  int $id
     * @param UpdateAuteurAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAuteurAPIRequest $request)
    {
        $input = $request->all();

        /** @var Auteur $auteur */
        $auteur = $this->auteurRepository->findWithoutFail($id);

        if (empty($auteur)) {
            return $this->sendError('Auteur not found');
        }

        $auteur = $this->auteurRepository->update($input, $id);

        return $this->sendResponse($auteur->toArray(), 'Auteur updated successfully');
    }

    /**
     * Remove the specified Auteur from storage.
     * DELETE /auteurs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Auteur $auteur */
        $auteur = $this->auteurRepository->findWithoutFail($id);

        if (empty($auteur)) {
            return $this->sendError('Auteur not found');
        }

        $auteur->delete();

        return $this->sendResponse($id, 'Auteur deleted successfully');
    }
}
