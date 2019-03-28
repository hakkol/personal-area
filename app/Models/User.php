<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    /**
    * Get the role associated with the given user.
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function role()
    {

        return $this->belongsTo('App\Models\Role');
    }

    /**
     * Checks the role of the user
     * @param  string $name role name
     * @return bool
     */
    public function checkRole(string $name): bool
    {
        $role = $this->role;

        if (!$role) return false;

        return $role->name === $name;
    }
}
