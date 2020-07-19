<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $table = 'services';

    /**
     * Get the vehicle that owns the service.
     *
     * @return BelongsTo
     */
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }

    /**
     * Get the items for the service.
     *
     * @return HasMany
     */
    public function serviceItems(): HasMany
    {
        return $this->hasMany(ServiceItem::class, 'service_id', 'id');
    }

}
