<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
	use HasFactory;

	use HasTranslations;

	public $translatable = ['name'];

	protected $guarded = [];

	protected $casts = [
		'name' => 'json',
	];

	public function scopeFilter($query, array $filters)
	{
		$query->when(
			$filters['search'] ?? false,
			function ($query, $search) {
				$query
		 ->where('country', 'like', '%' . $search . '%')
		 ->orWhere('name->ka', 'like', '%' . $search . '%');
			}
		);
		if ($filters['sortLocation'] ?? false)
		{
			if (request('sortLocation') === 'desc')
			{
				return Country::latest('country');
			}
		}
		if ($filters['sortNewCases'] ?? false)
		{
			if (request('sortNewCases') === 'desc')
			{
				return Country::latest('confirmed');
			}
			if (request('sortNewCases') === 'asc')
			{
				return Country::oldest('confirmed');
			}
		}
		if ($filters['sortDeaths'] ?? false)
		{
			if (request('sortDeaths') === 'desc')
			{
				return Country::latest('deaths');
			}
			if (request('sortDeaths') === 'asc')
			{
				return Country::oldest('deaths');
			}
		}
		if ($filters['sortRecovered'] ?? false)
		{
			if (request('sortRecovered') === 'desc')
			{
				return Country::latest('recovered');
			}
			if (request('sortRecovered') === 'asc')
			{
				return Country::oldest('recovered');
			}
		}
	}
}
