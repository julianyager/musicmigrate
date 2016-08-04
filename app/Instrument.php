<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    public function ads()
	{
			return $this->hasManyThrough(Ad::class, AdInstrument::class);//, 'instrument_id', 'id');
	}
}
