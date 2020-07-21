<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    protected $table = 'vehicles';

    /* ---- Relationships ---------------------------------------------------------------------- */
    /**
     * Get the customer that owns the vehicle.
     *
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    /**
     * Get the services for the vehicle.
     *
     * @return HasMany
     */
    public function services(): HasMany
    {
        return $this->hasMany(Service::class, 'vehicle_id', 'id');
    }

    /* ---- Auxiliary functions ---------------------------------------------------------------- */
    /**
     * Get the slug for friendly url.
     * This value is the concat of
     *      customer_id . id . - . make . - . model
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
