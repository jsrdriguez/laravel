<?php

namespace App\Http\Resources\Json;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentJson extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'user_id' => $this->user_id,
            'clp_usd' => $this->when($this->clp_usd != null, $this->clp_usd),
            'payment_date' => date("Y-m-d", strtotime($this->payment_date)),
            'expires_at' => date("Y-m-d", strtotime($this->expires_at)),
        ];
    }
}
