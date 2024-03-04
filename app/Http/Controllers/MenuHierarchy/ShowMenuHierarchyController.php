<?php

namespace App\Http\Controllers\MenuHierarchy;

use App\Http\Controllers\Controller;
use App\Services\MenuHierarchyService;
use Illuminate\Http\JsonResponse;

class ShowMenuHierarchyController extends Controller
{
    protected $service;

    public function __construct(MenuHierarchyService $service)
    {
        $this->service = $service;
    }

    public function __invoke($id): JsonResponse
    {
        return response()->json([
            'menu_one_item' => $this->service->show($id),
        ]);
    }
}
