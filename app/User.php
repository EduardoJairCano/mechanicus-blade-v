<?php

namespace App;

use App\Models\Address;
use App\Models\Customer;
use App\Models\Role;
use App\Models\UserInfo;
use App\Models\Vehicle;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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


    /* * * * RELATIONSHIPS * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
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


    /* * * * AUXILIARY FUNCTIONS * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
    /* ----- UserInfo functions ---------------------------------------------------------------- */
    /**
     * Auxiliary function to get the user full name.
     *
     * @return string
     */
    public function getFullName(): string
    {
        return $this->userInfo ? $this->userInfo->first_name . ' ' . $this->userInfo->last_name : '-';
    }

    /**
     * Auxiliary function to get the user cell phone.
     *
     * @return string
     */
    public function getCellPhoneNumber(): string
    {
        return $this->userInfo ?
            sprintf("%s %s %s",
                substr($this->userInfo->cell_phone_number, 0, 2),
                substr($this->userInfo->cell_phone_number, 3, 4),
                substr($this->userInfo->cell_phone_number, 6)) : '-';
    }

    /* ----- Roles functions ------------------------------------------------------------------- */
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

    /**
     * Auxiliary function to get the owner id.
     *
     * @return mixed
     */
    public function getOwnerId()
    {
        return $this->isOwner() ? $this->id : $this->owner[0]->id;
    }

    /* ----- Vehicles functions ---------------------------------------------------------------- */
    /**
     * Get the Vehicles records associated with the owner user.
     *
     * @return Builder[]|Collection
     */
    public function getUserVehicles()
    {
        $user_id = $this->getOwnerId();

        return Vehicle::with('owner')
            ->whereHas('owner', static function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            })->get();
    }
}
