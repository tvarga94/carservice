<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    protected $fillable = [
        'client_id',
        'car_id',
        'log_number',
        'event',
        'event_time',
        'document_id',
    ];

    protected $casts = [
        'event_time' => 'datetime',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class, 'car_id', 'car_id')
            ->where('client_id', $this->client_id);
    }
}
