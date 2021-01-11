<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    /**
     * The table name that belongs this model.
     *
     * @var string
     */
    protected $table = 'countries';

    /* * * * RELATIONSHIPS * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
    /**
     * Get the country that belongs the state.
     *
     * @return HasMany
     */
    public function states(): HasMany
    {
        return $this->hasMany(State::class, 'id', 'country_id');
    }
}
