<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Company extends Model
{
    protected $table = 'companies';

    /* ---- Relationships ---------------------------------------------------------------------- */
    /**
     * Get the address record associated with the company.
     *
     * @return HasOne
     */
    public function address(): HasOne
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }

    /**
     * Get the customer that owns the company.
     *
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'id', 'company_id');
    }

    /* ---- Auxiliary functions ---------------------------------------------------------------- */
    /**
     * Get the slug for friendly url.
     * This value is the concat of
     *      user_id . customer_id . address_id . - . first_name . - . last_name
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
