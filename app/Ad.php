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

	/**
	 * Relation - an ad has ONE genre's attached to it
	 *
	 * @return object
	 */
	public function genre()
	{
		return $this->hasOne(Genre::class, 'id', 'genre_id');
	}

}
