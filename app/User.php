<?php

namespace App;

use App\Models\Address;
use App\Models\Customer;
use App\Models\Role;
use App\Models\UserInfo;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /* ---- Relationships ---------------------------------------------------------------------- */
    /**
     * Get the User Info record associated with the user.
     *
     * @return HasOne
     */
    public function userInfo(): HasOne
    {
        return $this->hasOne(UserInfo::class, 'user_id', 'id');
    }

    /**
     * Get the Role record associated with the user.
     *
     * @return HasOne
     */
    public function role(): hasOne
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    /**
     * Get the Boss record associated with the user.
     *
     * @return HasOne
     */
    public function boss(): hasOne
    {
        return $this->hasOne(__CLASS__, 'id', 'boss_id');
    }

    /**
     * Get the sub users associated with the user.
     *
     * @return HasMany
     */
    public function subUsers(): hasMany
    {
        return $this->hasMany(__CLASS__, 'boss_id', 'id');
    }

    /**
     * Get the Address record associated with the user.
     *
     * @return MorphOne
     */
    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    /**
     * Get the Customer records associated with the user.
     *
     * @return HasMany
     */
    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class, 'user_id', 'id');
    }


    /** ---- Auxiliary functions --------------------------------------------------------------- */
    /**
     * Check if the User has a certain Role.
     *
     * @param array $roles
     * @return bool
     */
    public function hasRole(array $roles): bool
    {
        foreach ($roles as $role) {
            if ($this->role->name === $role) {
                return true;
            }
        }

        return false;
    }

}
