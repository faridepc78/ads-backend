<?php

namespace App\Http\Requests\Api\V1\Common\Ad;

use App\Enums\Api\V1\Ad\AdOperatorEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexAdRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'page' => ['nullable', 'numeric', 'min:1'],
            'per_page' => ['nullable', 'numeric', 'min:10', 'max:100'],
            'paginate' => ['required', 'boolean'],
            'filter.operator' => [
                'nullable',
                Rule::in(AdOperatorEnum::values()),
            ],
        ];
    }
}
