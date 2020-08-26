<?php

namespace App;

use App\Models\Address;
use App\Models\Customer;
use App\Models\Role;
use App\Models\UserInfo;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use softDeletes;

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
     * Get the Owner record associated with the user.
     *
     * @return BelongsToMany
     */
    public function owner(): BelongsToMany
    {
        return $this->belongsToMany(
            __CLASS__,
            'assigned_owners',
            'user_id',
            'owner_id',
            'id',
            'id',
            'owner'
        );
    }

    /**
     * Get the Sub Users associated with the user.
     *
     * @return BelongsToMany
     */
    public function subUsers(): BelongsToMany
    {
        return $this->belongsToMany(
            __CLASS__,
            'assigned_owners',
            'owner_id',
            'user_id',
            'id',
            'id',
            'subUser'
        );
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

    /**
     * Determines if the user is an owner role type.
     *
     * @return bool
     */
    public function isOwner(): bool
    {
        return $this->hasRole(['owner']);
    }
}
