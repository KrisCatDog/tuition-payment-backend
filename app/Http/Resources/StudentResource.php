<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'class_id' => $this->class_id,
            'tuition_id' => $this->tuition_id,
            'nisn' => $this->nisn,
            'nis' => $this->nis,
            'alamat' => $this->alamat,
            'no_telp' => $this->no_telp,
            'created_at' => $this->created_at->toFormattedDateString(),
            'updated_at' => $this->updated_at->toFormattedDateString(),
        ];
    }
}
