<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'date_of_birth',
        'address',
        'phone',
        'height',
        'weight',
        'is_active',
        'provider',
        'provider_id',
        'is_active',
        'avatar',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] =  bcrypt($password);
    }

    public function isAdmin()
    {
        return $this->attributes['role'] === self::ROLE_ADMIN;
    }

    public function isUser()
    {
        return $this->attributes['role'] === self::ROLE_USER;
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
