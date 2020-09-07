<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use SoftDeletes;

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


    /* * * * RELATIONSHIPS * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
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
     * Get the company that owns the vehicle.
     *
     * @return BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
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


    /* * * * AUXILIARY FUNCTIONS * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
    /* ----- Vehicle functions ----------------------------------------------------------------- */
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
     *      user_id . customer_id . vehicle_id . - . make . - . model . - . year
     *
     * @return bool
     */
    public function createSlug(): bool
    {
        $this->slug = $this->owner->user->id .
            $this->owner->id .
            $this->id . '-' .
            trim($this->make) . '-' .
            trim($this->model) . '-' .
            trim($this->year);
        $this->slug = str_replace(' ', '-', $this->slug);
        $this->save();

        return $this->slug !== '';
    }
}
