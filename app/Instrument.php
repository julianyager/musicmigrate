<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
	public function ads()
	{
		return $this->belongsToMany(Ad::class);
	}
}
