<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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

	public function ads()
	{
		return $this->hasMany(Ad::class);
	}

	public function genres()
	{
		return $this->hasMany(Genre::class);
	}

	public function instruments()
	{
		return $this->hasMany(instrument::class);
	}
}
