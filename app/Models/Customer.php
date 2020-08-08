<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

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
        'first_name',
        'last_name',
        'rfc',
        'email',
        'cell_phone_number',
        'slug',
        'user_id'
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
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }


    /**
     * Creating the slug for friendly url.
     * This value is the concat of
     *      user_id . customer_id . - . first_name . - . last_name
     *
     * @return bool
     */
    public function createSlug(): bool
    {
        $this->slug = $this->user->id . $this->id . '-' . trim($this->first_name) . '-' . trim($this->last_name);
        $this->slug = str_replace(' ', '-', $this->slug);
        $this->save();

        return $this->slug !== '';
    }

}
