<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'officer' => new OfficerResource($this->officer),
            'student' => new StudentResource($this->student),
            'jumlah_bayar' => $this->jumlah_bayar,
            'paid_at' => $this->paid_at->toFormattedDateString(),
        ];
    }
}
