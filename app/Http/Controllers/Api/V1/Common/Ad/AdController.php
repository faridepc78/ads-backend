<?php

namespace App\Http\Controllers\Api\V1\Common\Ad;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Common\Ad\IndexAdRequest;
use App\Http\Resources\Api\V1\Common\Ad\AdPaginateResource;
use App\Http\Resources\Api\V1\Common\Ad\AdResource;
use App\Models\Ad;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class AdController extends Controller
{
    public function index(IndexAdRequest $request)
    {
        $paginate = $request->input('paginate');

        $ads = QueryBuilder::for(Ad::class)
            ->allowedFilters([
                AllowedFilter::exact('operator')
            ])
            ->latest()
            ->with([
                'user',
            ])
            ->when($paginate == true,
                function ($query) use ($request) {
                    return $query->paginate($request->input('per_page', 10));
                },
                function ($query) {
                    return $query->get();
                }
            );

        return $paginate
            ? new AdPaginateResource($ads)
            : $this->successResponse(AdResource::
            collection($ads),
                'show all of ads',
                200,
                ['total' => count($ads)]);
    }

    public function show(Ad $ad)
    {
        return $this->successResponse(AdResource::
        make($ad->load([
            'user',
        ])),
            'show ad information');
    }
}
