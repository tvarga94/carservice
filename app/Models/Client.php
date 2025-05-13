<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    protected $fillable = [
        'name',
        'idcard',
    ];

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }
}
