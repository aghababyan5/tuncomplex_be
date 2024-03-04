<?php

namespace App\Http\Controllers\MenuHierarchy;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenuHierarchyRequest;
use App\Services\MenuHierarchyService;
use Illuminate\Http\JsonResponse;

class StoreMenuHierarchyController extends Controller
{
    protected $service;

    public function __construct(MenuHierarchyService $service)
    {
        $this->service = $service;
    }

    public function __invoke(StoreMenuHierarchyRequest $request): JsonResponse
    {
        $this->service->store($request->validated());

        return response()->json([
            'message' => 'Data stored successfully',
        ]);
    }
}
