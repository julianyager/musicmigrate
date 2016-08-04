<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function instrument()
	{
		return $this->belongsTo(Instrument::class);
	}
}
