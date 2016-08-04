<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdInstrument extends Model
{
	public function ad()
	{
		return $this->belongsTo(Ad::class);
	}
	
	public function instrument()
	{
		return $this->belongsTo(Instrument::class);
	}
}
