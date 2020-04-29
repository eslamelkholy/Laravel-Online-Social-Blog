<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class UsersPhone extends Model
{
    // By Default value Null if it isn't Deleted
    use SoftDeletes;

    // OneToMany Inverse
    public function user()
    {
        return $this->belongsToMany('App\User', 'user');
    }   

    protected $fillable = ['phone', 'user'];
}
