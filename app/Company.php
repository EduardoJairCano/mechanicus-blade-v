<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Company extends Model
{
    /**
     * The table name that belongs this model.
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'active', 'slug', 'customer_id'
    ];


    /* ---- Relationships ---------------------------------------------------------------------- */
    /**
     * Get the address record associated with the company.
     *
     * @return MorphOne
     */
    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    /**
     * Get the customer that owns the company.
     *
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }


    /* ---- Auxiliary functions ---------------------------------------------------------------- */
    /**
     * Get the slug for friendly url.
     * This value is the concat of
     *      user_id . customer_id . - . name
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
