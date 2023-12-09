<?php

namespace App\Http\Controllers\Partners;

use App\Http\Controllers\Controller;
use App\Http\Requests\Partners\StorePartnerRequest;
use App\Services\PartnerService;

class StorePartnerController extends Controller
{

    protected $service;

    public function __construct(PartnerService $service)
    {
        $this->service = $service;
    }

    public function __invoke(StorePartnerRequest $request)
    {
        $this->service->store($request->validated());

        return response()->json([
            'message' => 'Data stored successfully',
        ]);
    }

}
