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
		return $this->belongsToMany(Instrument::class, 'ad_instrument');
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

	/**
	 * scopeContainsKeywords
	 * @param  [type] $query
	 * @param  [type] $keywords
	 * @return query
	 */
	public function scopeContainsKeywords($query, $keywords)
	{
			if($keywords && !empty($keywords))
			{
				$query = $query->where(function($search) use ($keywords)
				{
					$search->where('title', 'LIKE', "%$keywords%")
						->orWhere('description', 'LIKE', "%$keywords%");
				});
			}
			return $query;
	}

	/**
	 * [scopeWhereGenre description]
	 * @param  [type] $query    [description]
	 * @param  [type] $genre_id [description]
	 * @return [type]           [description]
	 */
	public function scopeWhereGenre($query, $genre_id)
	{
		return $query->where('genre_id', '=', $genre_id);
	}
}
