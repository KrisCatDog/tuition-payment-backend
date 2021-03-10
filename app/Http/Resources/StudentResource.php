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
            'user' => new UserResource($this->user),
            'class' => new ClassResource($this->class),
            'tuition' => new TuitionResource($this->tuition),
            'nisn' => $this->nisn,
            'nis' => $this->nis,
            'alamat' => $this->alamat,
            'no_telp' => $this->no_telp,
            'created_at' => $this->created_at->toFormattedDateString(),
            'updated_at' => $this->updated_at->toFormattedDateString(),
        ];
    }
}
