<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateImageAPIRequest;
use App\Http\Requests\API\UpdateImageAPIRequest;
use App\Models\Image;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ImageController
 * @package App\Http\Controllers\API
 */

class ImageAPIController extends AppBaseController
{
    /** @var  ImageRepository */
    private $imageRepository;

    public function __construct(ImageRepository $imageRepo)
    {
        $this->imageRepository = $imageRepo;
    }

    /**
     * Display a listing of the Image.
     * GET|HEAD /images
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->imageRepository->pushCriteria(new RequestCriteria($request));
        $this->imageRepository->pushCriteria(new LimitOffsetCriteria($request));
        $images = $this->imageRepository->all();

        return $this->sendResponse($images->toArray(), 'Images retrieved successfully');
    }

    /**
     * Store a newly created Image in storage.
     * POST /images
     *
     * @param CreateImageAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateImageAPIRequest $request)
    {
        $input = $request->all();

        $images = $this->imageRepository->create($input);

        return $this->sendResponse($images->toArray(), 'Image saved successfully');
    }

    /**
     * Display the specified Image.
     * GET|HEAD /images/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Image $image */
        $image = $this->imageRepository->findWithoutFail($id);

        if (empty($image)) {
            return $this->sendError('Image not found');
        }

        return $this->sendResponse($image->toArray(), 'Image retrieved successfully');
    }

    /**
     * Update the specified Image in storage.
     * PUT/PATCH /images/{id}
     *
     * @param  int $id
     * @param UpdateImageAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateImageAPIRequest $request)
    {
        $input = $request->all();

        /** @var Image $image */
        $image = $this->imageRepository->findWithoutFail($id);

        if (empty($image)) {
            return $this->sendError('Image not found');
        }

        $image = $this->imageRepository->update($input, $id);

        return $this->sendResponse($image->toArray(), 'Image updated successfully');
    }

    /**
     * Remove the specified Image from storage.
     * DELETE /images/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Image $image */
        $image = $this->imageRepository->findWithoutFail($id);

        if (empty($image)) {
            return $this->sendError('Image not found');
        }

        $image->delete();

        return $this->sendResponse($id, 'Image deleted successfully');
    }
}
