<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCoursAPIRequest;
use App\Http\Requests\API\UpdateCoursAPIRequest;
use App\Models\Cours;
use App\Repositories\CoursRepository;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use \Unisharp\FileApi\FileApi;

/**
 * Class CoursController
 * @package App\Http\Controllers\API
 */

class CoursAPIController extends AppBaseController
{
    /** @var  CoursRepository */
    private $coursRepository;
    private $imagesRepository;

    public function __construct(ImageRepository $imagesRepository,
                                CoursRepository $coursRepo)
    {
        $this->coursRepository = $coursRepo;
        $this->imagesRepository = $imagesRepository;
    }

    /**
     * Display a listing of the Cours.
     * GET|HEAD /cours
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->coursRepository->pushCriteria(new RequestCriteria($request));
        $this->coursRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cours = $this->coursRepository->all();
        return response()->json($cours);

    }

    /**
     * Store a newly created Cours in storage.
     * POST /cours
     *
     * @param CreateCoursAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCoursAPIRequest $request)
    {
        $input = $request->all();

        $cours = $this->coursRepository->create($input);
        $image = $this->imagesRepository->addImage($request->input(['image_name']),$cours->id,true);

        return $this->sendResponse($cours->toArray(), 'Cours saved successfully');
    }

    /**
     * Display the specified Cours.
     * GET|HEAD /cours/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Cours $cours */
        $cours = $this->coursRepository->findWithoutFail($id);

        if (empty($cours)) {
            return $this->sendError('Cours not found');
        }

        return $this->sendResponse($cours->toArray(), 'Cours retrieved successfully');
    }

    /**
     * Update the specified Cours in storage.
     * PUT/PATCH /cours/{id}
     *
     * @param  int $id
     * @param UpdateCoursAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCoursAPIRequest $request)
    {
        $input = $request->all();

        /** @var Cours $cours */
        $cours = $this->coursRepository->findWithoutFail($id);

        if (empty($cours)) {
            return $this->sendError('Cours not found');
        }

        $cours = $this->coursRepository->update($input, $id);

        return $this->sendResponse($cours->toArray(), 'Cours updated successfully');
    }

    /**
     * Remove the specified Cours from storage.
     * DELETE /cours/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Cours $cours */
        $cours = $this->coursRepository->findWithoutFail($id);

        if (empty($cours)) {
            return $this->sendError('Cours not found');
        }

        $cours->delete();

        return $this->sendResponse($id, 'Cours deleted successfully');
    }

//    public function uploadImage(Request $request)
//    {
//        $fa = new FileApi('images/cours/');
//        $file = $fa->save($request->file('image'));
//        return $this->sendResponse($file-> ,'Image Uploaded successfully');
//    }
}
