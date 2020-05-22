<?php

namespace App\Http\Resources\Json;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientJson extends JsonResource
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
            'email' => $this->email,
            'join_date' => date("Y-m-d", strtotime($this->client->join_date))
        ];
    }
}
