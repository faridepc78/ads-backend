<?php

namespace App\Http\Resources\Api\V1\Common\Ad;

use App\Http\Resources\Api\V1\Common\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AdResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'operator' => $this->operator,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'user' => $this->whenLoaded('user', function () {
                return UserResource::make($this->user);
            }),
        ];
    }
}
