<?php

namespace App\Models;

use App\Models\UserProfile;
use App\UserToken;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'username', 'email', 'password', 'image', 'status', 'country_id', 'role_id'
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

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasPermission($permission)
    {
        return $this->role->permissions()->where('name', $permission)->first() ?: false;
    }
    public function picture()
    {
        if (is_null(user()->image)) {
            return '/img/user/default/default.svg';
        } else {
            return '/img/user/' . user()->image;
        }
    }

    public function level()
    {
        return ucfirst($this->role->name);
    }

    public function token()
    {
        return $this->hasOne(UserToken::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function activities()
    {
        return $this->hasMany(UserActivity::class);
    }
}
