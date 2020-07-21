<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    /**
     * The table name that belongs this model.
     *
     * @var string
     */
    protected $table = 'vehicles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plate',
        'serial_number',
        'make',
        'model',
        'year',
        'engine',
        'cylinder_count',
        'transmission',
        'drivetrain',
        'fuel',
        'color',
        'slug',
        'customer_id'
    ];


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
     *      user_id . customer_id . id . - . make . - . model . - . year
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

}
