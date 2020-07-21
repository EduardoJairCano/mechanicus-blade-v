<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Customer extends Model
{
    /**
     * The table name that belongs this model.
     *
     * @var string
     */
    protected $table = 'customers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'rfc', 'email', 'cell_phone_number', 'slug', 'user_id'
    ];


    /* ---- Relationships ---------------------------------------------------------------------- */
    /**
     * Get the address record associated with the customer.
     *
     * @return MorphOne
     */
    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    /**
     * Get the user that owns the customer.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the company record associated with the customer.
     *
     * @return HasOne
     */
    public function company(): HasOne
    {
        return $this->hasOne(Company::class, 'customer_id', 'id');
    }

    /**
     * Get the vehicles of the customer.
     *
     * @return HasMany
     */
    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class, 'customer_id', 'id');
    }


    /* ---- Auxiliary functions ---------------------------------------------------------------- */
    /**
     * Get the slug for friendly url.
     * This value is the concat of
     *      user_id . customer_id . - . first_name . - . last_name
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

}
