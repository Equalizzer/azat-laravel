<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

//    protected $table = 'users';   //ete tablicai unun@ urisha linum

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function upperName()
    {
        return strtoupper($this->name);
    }

    //get{column}Attribute
    //accessor
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    //set{column}Attribute
    //mutator
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function products()
    {
        return $this->hasMany(Products::class);
    }

}
