<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'no_handphone' => $this->no_handphone,
            'alamat_lengkap' => $this->alamat_lengkap,
            'jenis_kelamin' => $this->jenis_kelamin,
            'alergi_obat' => $this->alergi_obat,
            'keterangan_alergi' => $this->keterangan_alergi,
            'tanggal_lahir' => $this->tanggal_lahir,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
