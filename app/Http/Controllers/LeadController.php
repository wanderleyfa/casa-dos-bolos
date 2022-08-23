<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use App\Http\Resources\LeadCollection;
use App\Http\Resources\LeadResource;
use App\Models\Lead;
use App\Repository\LeadRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LeadController extends ApiController
{
    private Lead $lead;
    private StoreLeadRequest $storeLeadRequest;
    private UpdateLeadRequest $updateLeadRequest;

    public function __construct(Lead $lead)
    {
        $this->lead = $lead;
        $this->storeLeadRequest = new StoreLeadRequest();
        $this->updateLeadRequest = new UpdateLeadRequest();
    }

    public function index(Request $request): LeadCollection
    {
        $leadRepository = new LeadRepository($this->lead);

        if ($request->has('conditions')) {
            $leadRepository->selectConditions($request->get('conditions'));
        }

        if ($request->has('fields')) {
            $leadRepository->selectFiltro($request->get('fields'));
        }

        return new LeadCollection($leadRepository->getResult()->paginate(500));
    }

    public function show(Lead $lead): JsonResponse
    {
        return $this->successResponse(LeadResource::mapLeadResponse($lead), 'Lead recovered successfully!');
    }

    public function store(Request $request): JsonResponse
    {
        if ($this->validateForm($request->all(), $this->storeLeadRequest->rules()) == true) {
            return $this->successResponse(LeadResource::mapLeadResponse(
                $this->lead->create(
                    $request->all()
                )
            ), 'Lead created successfully!', 201);
        }

        return $this->errorMessages();
    }

    public function update(Lead $lead, Request $request): JsonResponse
    {
        if ($this->validateForm($request->all(), $this->updateLeadRequest->rules()) == true) {
            $lead->update($request->all());

            return $this->successResponse(LeadResource::mapLeadResponse(
                $lead
            ), 'Lead Updated Successfully!', 201);
        }

        return $this->errorMessages();
    }

    public function destroy(Lead $lead): JsonResponse
    {
        $lead->delete();
        return $this->successResponse([], 'Lead successfully removed!', 202);
    }
}
