<?php

namespace App\Http\Controllers\Partners;

use App\Http\Controllers\Controller;
use App\Services\PartnerService;
use Illuminate\Http\JsonResponse;

class GetPartnersController extends Controller
{

    protected $service;

    public function __construct(PartnerService $service)
    {
        $this->service = $service;
    }

    public function __invoke(): JsonResponse
    {
        return response()->json([
            'partners' => $this->service->getAll(),
        ]);
    }

}
