<?php

namespace Tests\Feature;

use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class FetchDataCommandTest extends TestCase
{
	use RefreshDatabase;

	public function setUp(): void
	{
		parent::setUp();

		Http::fake([
			'/countries' => Http::response([
				[
					'code' => 'GE',
					'name' => ['en' => 'Georgia', 'ka' => 'საქართველო'],
				],
			]),

			'/get-country-statistics' => Http::response([
				'id'         => 29,
				'country'    => 'Georgia',
				'code'       => 'GE',
				'confirmed'  => 2810,
				'recovered'  => 808,
				'critical'   => 160,
				'deaths'     => 80,
				'created_at' => now(),
				'updated_at' => now(),
			]),
		]);
	}

	public function test_fetch_data_successfully()
	{
		Country::create([
			'id'         => 29,
			'code'       => 'GE',
			'name'       => [
				'en' => 'Georgia',
				'ka' => 'საქართველო',
			],
			'country'    => 'Georgia',
			'confirmed'  => 250,
			'recovered'  => 150,
			'deaths'     => 20,
			'created_at' => now()->subDays(3),
			'updated_at' => now()->subDay(),
		]);

		$this->artisan('fetch:data')->assertSuccessful();

		$this->assertDatabaseHas('countries', [
			'confirmed'  => 250,
			'recovered'  => 150,
			'deaths'     => 20,
		]);
	}
}
