<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'country'              => 'georgia',
			'name'                 => json_encode(['en' => 'Georgia', 'ka' => 'საქართველო']),
			'code'                 => 'GE',
			'confirmed'            => '327',
			'recovered'            => '1000',
			'deaths'               => '100',
		];
	}
}
