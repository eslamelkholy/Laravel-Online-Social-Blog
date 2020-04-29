<?php

namespace App;

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
        'name', 'username', 'email', 'password'
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

    // Phones Relationship
    public function usersphones()
    {
        return $this->hasMany('App\UsersPhone','user');
    }

    // My Contacts Relationship
    public function contacts()
    {
        return $this->belongsToMany('App\User', 'contacts', 'user_id', 'contact_id');
    }

    // My Contacts Inverse Relationship
    public function theUsers()
    {
        return $this->belongsToMany('App\User', 'contacts', 'contact_id', 'user_id');
    }
}
