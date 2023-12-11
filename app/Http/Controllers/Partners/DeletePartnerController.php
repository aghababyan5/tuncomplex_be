<?php

namespace App\Http\Controllers\Partners;

use App\Http\Controllers\Controller;
use App\Services\PartnerService;
use Illuminate\Http\JsonResponse;

class DeletePartnerController extends Controller
{

    protected $service;

    public function __construct(PartnerService $service)
    {
        $this->service = $service;
    }

    public function __invoke($id): JsonResponse
    {
        $this->service->destroy($id);

        return response()->json([
            'message' => 'Data deleted successfully',
        ]);
    }

}
