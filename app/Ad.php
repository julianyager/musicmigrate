<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function instruments()
	{
		return $this->belongsToMany(Instrument::class);
	}

	public function genres()
	{
		return $this->hasMany(Genre::class);
	}

}
