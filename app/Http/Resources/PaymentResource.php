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
            'id' => $this->id,
            'officer' => new OfficerResource($this->officer),
            'student' => new StudentResource($this->student),
            'amount_paid' => $this->amount_paid,
            'bills_date' => $this->bills_date->isoFormat('MMMM Y'),
            'paid_on' => $this->paid_at->isoFormat('dddd, D MMMM Y'),
            'paid_at' => $this->paid_at->format('H:i:s'),
            'created_at' => $this->created_at->toFormattedDateString(),
            'updated_at' => $this->updated_at->toFormattedDateString(),
        ];
    }
}
