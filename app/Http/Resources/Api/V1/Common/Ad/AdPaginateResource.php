<?php

namespace App\Http\Resources\Api\V1\Common\Ad;


use App\Http\Resources\Api\V1\Common\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AdPaginateResource extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'status' => 'Success',
            'message' => 'show all of ads by paginate',
            'code' => 200,
            'data' => $this->collection
                ->when($request->has(['user']), function ($collection) {
                    $collection->loadMissing(['user']);
                })
                ->map(function ($item) {
                    $data = [
                        'id' => $item->id,
                        'title' => $item->title,
                        'description' => $item->description,
                        'operator' => $item->operator,
                        'created_at' => $item->created_at,
                        'updated_at' => $item->updated_at,
                    ];

                    if ($item->relationLoaded('user')) {
                        $data['user'] = UserResource::make($item->user);
                    }

                    return $data;
                }),
        ];
    }
}
