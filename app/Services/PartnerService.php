<?php

namespace App\Services;

use App\Models\Partner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PartnerService
{

    public function getAll()
    {
        return Partner::all();
    }

    public function store(array $data)
    {
        $iconName = Str::random(32).'.'
            .$data['icon']->getClientOriginalExtension();
        Storage::put('/partners', $data['icon']->getContent());

        return Partner::create([
            'icon'        => $iconName,
            'name'        => $data['name'],
            'description' => $data['description'],
            'website_url' => $data['website_url'],
        ]);
    }

}
