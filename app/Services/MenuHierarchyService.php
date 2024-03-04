<?php

namespace App\Services;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Collection;

class MenuHierarchyService
{
    public function store(array $data)
    {
        return Menu::create($data);
    }

    public function getAll(): Collection
    {
        return Menu::all();
    }

    public function show($id)
    {
        return Menu::findOrFail($id);
    }
}
