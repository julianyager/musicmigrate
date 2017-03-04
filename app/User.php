<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
	use HasRoles;
	
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

	// public function genres()
	// {
	// 	return $this->hasManyThrough('App\Genre', 'App\Ad');
	// 	// return $this->hasMany(Genre::class);
	// }

	public function instruments()
	{
		return $this->hasMany(instrument::class);
	}
}
