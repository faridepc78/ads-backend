<?php

namespace App\Models;

use App\Enums\Api\V1\Ad\AdOperatorEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ad extends Model
{
    use HasFactory;

    protected $table = 'ads';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at',
        ];

    protected $fillable =
        [
            'title',
            'description',
            'operator',
            'user_id',
        ];

    protected $casts =
        [
            'operator' => AdOperatorEnum::class,
        ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
