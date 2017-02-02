<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
	public function ad()
	{
		return $this->belongsTo(Ad::class);
	}
}
