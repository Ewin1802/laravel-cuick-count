<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PemungutanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,
            'nm_paslon' => $this->nm_paslon,
            'lokasi_id' => $this->lokasi_id,
            'nm_dapil' => $this->nm_dapil,
            'suara' => $this->suara,
            'validateds' => $this->validateds,

        ];
    }
}
