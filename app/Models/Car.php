<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Car extends Model
{
    protected $fillable = [
        'client_id',
        'car_id',
        'type',
        'registered',
        'ownbrand',
        'accidents',
    ];

    protected $casts = [
        'registered' => 'date',
        'ownbrand' => 'boolean',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class, 'car_id', 'car_id')
            ->where('client_id', $this->client_id);
    }

    public function latestService(): HasOne
    {
        return $this->hasOne(Service::class, 'car_id', 'car_id')
            ->where('client_id', $this->client_id)
            ->latest('log_number');
    }
}
