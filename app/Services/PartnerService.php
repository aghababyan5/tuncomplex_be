<?php

namespace App\Services;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PartnerService
{

    public function getAll(): Collection
    {
        return Partner::all();
    }

    public function store(array $data)
    {
        $iconName = Str::random(32).'.'
            .$data['icon']->getClientOriginalExtension();

        Storage::disk('public')->put(
            '/partners/'.$iconName,
            file_get_contents($data['icon'])
        );

        return Partner::create([
            'icon'        => $iconName,
            'name'        => $data['name'],
            'description' => $data['description'],
            'website_url' => $data['website_url'],
        ]);
    }

    public function show($id)
    {
        return Partner::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $partner = Partner::findOrFail($id);

        if (isset($data['icon']) && $data['icon'] != '') {
            return $this->updateWithIcon($partner, $data);
        }

        return $this->updateWithoutIcon($partner, $data);
    }

    public function updateWithIcon($partner, $data)
    {
        $oldIconName = $partner['icon'];
        $newIcon = $data['icon'];
        $newIconName = Str::random(32).'.'
            .$newIcon->getClientOriginalExtension();

        Storage::disk('public')->delete('partners/'.$oldIconName);
        Storage::disk('public')->put(
            '/partners/'.$newIconName,
            file_get_contents($newIcon)
        );

        return $partner->update([
            'icon'        => $newIconName,
            'name'        => $data['name'],
            'description' => $data['description'],
            'website_url' => $data['website_url'],
        ]);
    }

    public function updateWithoutIcon($partner, $data)
    {
        return $partner->update([
            'name'        => $data['name'],
            'description' => $data['description'],
            'website_url' => $data['website_url'],
        ]);
    }

    public function destroy($id)
    {
        $partner = Partner::find($id);
        $partnerName = $partner['icon'];

        Storage::disk('public')->delete('partners/'.$partnerName);

        return Partner::find($id)->delete();
    }

}
