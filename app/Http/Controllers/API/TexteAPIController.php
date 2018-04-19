<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTexteAPIRequest;
use App\Http\Requests\API\UpdateTexteAPIRequest;
use App\Models\Texte;
use App\Repositories\TexteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TexteController
 * @package App\Http\Controllers\API
 */

class TexteAPIController extends AppBaseController
{
    /** @var  TexteRepository */
    private $texteRepository;

    public function __construct(TexteRepository $texteRepo)
    {
        $this->texteRepository = $texteRepo;
    }

    /**
     * Display a listing of the Texte.
     * GET|HEAD /textes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->texteRepository->pushCriteria(new RequestCriteria($request));
        $this->texteRepository->pushCriteria(new LimitOffsetCriteria($request));
        $textes = $this->texteRepository->all();

        return $this->sendResponse($textes->toArray(), 'Textes retrieved successfully');
    }

    /**
     * Store a newly created Texte in storage.
     * POST /textes
     *
     * @param CreateTexteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTexteAPIRequest $request)
    {
        $input = $request->all();

        $textes = $this->texteRepository->create($input);

        return $this->sendResponse($textes->toArray(), 'Texte saved successfully');
    }

    /**
     * Display the specified Texte.
     * GET|HEAD /textes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Texte $texte */
        $texte = $this->texteRepository->findWithoutFail($id);

        if (empty($texte)) {
            return $this->sendError('Texte not found');
        }

        return $this->sendResponse($texte->toArray(), 'Texte retrieved successfully');
    }

    /**
     * Update the specified Texte in storage.
     * PUT/PATCH /textes/{id}
     *
     * @param  int $id
     * @param UpdateTexteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTexteAPIRequest $request)
    {
        $input = $request->all();

        /** @var Texte $texte */
        $texte = $this->texteRepository->findWithoutFail($id);

        if (empty($texte)) {
            return $this->sendError('Texte not found');
        }

        $texte = $this->texteRepository->update($input, $id);

        return $this->sendResponse($texte->toArray(), 'Texte updated successfully');
    }

    /**
     * Remove the specified Texte from storage.
     * DELETE /textes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Texte $texte */
        $texte = $this->texteRepository->findWithoutFail($id);

        if (empty($texte)) {
            return $this->sendError('Texte not found');
        }

        $texte->delete();

        return $this->sendResponse($id, 'Texte deleted successfully');
    }
}
