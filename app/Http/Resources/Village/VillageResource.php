<?php

namespace App\Http\Resources\Village;

use App\Http\Resources\Default\CreatedAtResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VillageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' =>$this->id,
            'code' =>$this->code,
            'districtCode' =>$this->district_code,
            'name' =>$this->name,
            'metaData' =>json_decode($this->meta,true),
            'createdAt' =>new CreatedAtResource($this->created_at),
            'updatedAt' =>new CreatedAtResource($this->updated_at),

        ];
    }
}
