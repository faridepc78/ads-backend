<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at',
        ];

    protected $fillable =
        [
            'name',
            'email',
            'email_verified_at',
            'password',
        ];

    protected $hidden =
        [
            'password',
        ];

    protected $casts =
        [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];

    public function ads(): HasMany
    {
        return $this->hasMany(Ad::class);
    }
}
