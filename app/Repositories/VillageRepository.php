<?php

namespace App\Repositories;

use App\Interface\VillageInterface;
use App\Models\Village;

class VillageRepository implements  VillageInterface
{

    public function getAllData($request)
    {
        $perPage = $request->perPage ?: 4;
        $data =Village::paginate($perPage);
        return $data;
    }

    public function saveVillage($data)
    {
        $village =Village::create($data);
        return $village;
    }

    public function findVillageById($id)
    {
        $data =Village::find($id);
        return $data;
    }

    public function updateVillageById($oldData, $newData)
    {
        $oldData->update($newData);
        $oldData->refresh();
        return $oldData;
    }

    public function deleteVillage($data)
    {
        $data->delete();
        $data->refresh();
        return $data;
    }

    public  function getLatsVillage(){
        $data =Village::latest()
            ->first()->code ?? null;
        return $data;
    }
}
