<?php

namespace App\Http\Resources\Api\V1\Common\User;

use App\Http\Resources\Api\V1\Common\Ad\AdResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email'=> $this->email,
            'email_verified_at'=> $this->email_verified_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'ads' => $this->whenLoaded('ads', function () {
                return AdResource::collection($this->ads);
            }),
        ];
    }
}
