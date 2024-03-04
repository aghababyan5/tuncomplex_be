<?php

namespace App\Http\Controllers\MenuHierarchy;

use App\Http\Controllers\Controller;
use App\Services\MenuHierarchyService;
use Illuminate\Http\JsonResponse;

class GetAllMenuHierarchyController extends Controller
{
    protected $service;

    public function __construct(MenuHierarchyService $service)
    {
        $this->service = $service;
    }

    public function __invoke(): JsonResponse
    {
        return response()->json([
            'menu' => $this->service->getAll(),
        ]);
    }
}
