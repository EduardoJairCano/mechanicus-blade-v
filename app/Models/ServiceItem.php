<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceItem extends Model
{
    /**
     * The table name that belongs this model.
     *
     * @var string
     */
    protected $table = 'services_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantity',
        'description',
        'unit_price',
        'price',
        'tax',
        'final_price',
        'service_id'
    ];


    /* ---- Relationships ---------------------------------------------------------------------- */
    /**
     * Get the vehicle that owns the service.
     *
     * @return BelongsTo
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

}
