<?php

namespace App\Http\Controllers\Partners;

use App\Http\Controllers\Controller;
use App\Http\Requests\Partners\UpdatePartnerRequest;
use App\Services\PartnerService;
use Illuminate\Http\JsonResponse;

class UpdatePartnerController extends Controller
{

    protected $service;

    public function __construct(PartnerService $service)
    {
        $this->service = $service;
    }

    public function __invoke($id, UpdatePartnerRequest $request): JsonResponse
    {
        $this->service->update($id, $request->validated());

        return response()->json([
            'message' => 'Data updated successfully',
        ]);
    }

}
