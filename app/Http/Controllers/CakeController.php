<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCakeRequest;
use App\Http\Requests\UpdateCakeRequest;
use App\Http\Resources\CakeCollection;
use App\Http\Resources\CakeResource;
use App\Models\Cake;
use App\Repository\CakeRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CakeController extends ApiController
{
    private Cake $cake;
    private StoreCakeRequest $storeCakeRequest;
    private UpdateCakeRequest $updateCakeRequest;

    public function __construct(Cake $cake)
    {
        $this->cake = $cake;
        $this->storeCakeRequest = new StoreCakeRequest();
        $this->updateCakeRequest = new UpdateCakeRequest();
    }

    public function index(Request $request): CakeCollection
    {
        $cakeRepository = new CakeRepository($this->cake);

        if ($request->has('conditions')) {
            $cakeRepository->selectConditions($request->get('conditions'));
        }

        if ($request->has('fields')) {
            $cakeRepository->selectFiltro($request->get('fields'));
        }

        return new CakeCollection($cakeRepository->getResult()->paginate(500));
    }

    public function show(Cake $cake): JsonResponse
    {
        return $this->successResponse(CakeResource::mapCakeResponse($cake), 'Cake recovered successfully!');
    }

    public function store(Request $request): JsonResponse
    {
        if ($this->validateForm($request->all(), $this->storeCakeRequest->rules()) == true) {
            return $this->successResponse(CakeResource::mapCakeResponse(
                $this->cake->create(
                    $request->all()
                )
            ), 'Cake created successfully!', 201);
        }

        return $this->errorMessages();
    }

    public function update(Cake $cake, Request $request): JsonResponse
    {
        if ($this->validateForm($request->all(), $this->updateCakeRequest->rules()) == true) {
            $cake->update($request->all());

            return $this->successResponse(CakeResource::mapCakeResponse(
                $cake
            ), 'Cake Updated Successfully!', 201);
        }

        return $this->errorMessages();
    }

    public function destroy(Cake $cake): JsonResponse
    {
        $cake->delete();
        return $this->successResponse([], 'Cake successfully removed!', 202);
    }
}
