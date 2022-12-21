<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CountryTest extends TestCase
{
	use RefreshDatabase;

	public function test_by_country_page_is_rendered()
	{
		$user = User::factory()->create([
			'email_verified_at' => now(),
		]);
		$this->actingAs($user);
		$response = $this->get('dashboard/bycountry');
		$response->assertStatus(200);
	}

	public function test_country_search_ka_with_name()
	{
		$user = User::factory()->create([
			'email_verified_at' => now(),
		]);
		$this->actingAs($user);
		Country::create([
			'name'           => json_encode(['en' => 'Georgia', 'ka' => 'საქართველო']),
			'code'           => 'GE',
			'country'        => 'Georgia',
			'confirmed'      => 2000,
			'recovered'      => 550,
			'deaths'         => 121,
		]);
		$response = $this->withSession(['locale' => 'ka'])->get('/dashboard/bycountry?search=საქართველო');
		$response->assertSuccessful();
	}

		 public function test_country_search_en_with_name()
		 {
		 	$user = User::factory()->create([
		 		'email_verified_at' => now(),
		 	]);
		 	$this->actingAs($user);
		 	Country::create([
		 		'name'           => json_encode(['en' => 'Georgia', 'ka' => 'საქართველო']),
		 		'code'           => 'GE',
		 		'country'        => 'Georgia',
		 		'confirmed'      => 2000,
		 		'recovered'      => 550,
		 		'deaths'         => 121,
		 	]);
		 	$response = $this->withSession(['locale' => 'en'])->get('/dashboard/bycountry?search=georgia');
		 	$response->assertSee('Georgia');
		 }

		 public function test_country_location_sort_descending()
		 {
		 	$user = User::factory()->create([
		 		'email_verified_at' => now(),
		 	]);
		 	$this->actingAs($user);
		 	Country::create([
		 		'name'           => json_encode(['en' => 'Georgia', 'ka' => 'საქართველო']),
		 		'code'           => 'GE',
		 		'country'        => 'Georgia',
		 		'confirmed'      => 2000,
		 		'recovered'      => 550,
		 		'deaths'         => 121,
		 	]);
		 	Country::create([
		 		'name'           => json_encode(['en' => 'Albania', 'ka' => 'ალბანეთი']),
		 		'code'           => 'AL',
		 		'country'        => 'Albania',
		 		'confirmed'      => 5000,
		 		'recovered'      => 200,
		 		'deaths'         => 191,
		 	]);
		 	$response = $this->get('dashboard/bycountry?sortLocation=desc');
		 	$response->assertSeeTextInOrder(['Georgia', 'Albania']);
		 }

		public function test_country_new_cases_sort_descending()
		{
			$user = User::factory()->create([
				'email_verified_at' => now(),
			]);
			$this->actingAs($user);
			Country::create([
				'name'           => json_encode(['en' => 'Albania', 'ka' => 'ალბანეთი']),
				'code'           => 'AL',
				'country'        => 'Albania',
				'confirmed'      => 5000,
				'recovered'      => 200,
				'deaths'         => 191,
			]);
			Country::create([
				'name'           => json_encode(['en' => 'Georgia', 'ka' => 'საქართველო']),
				'code'           => 'GE',
				'country'        => 'Georgia',
				'confirmed'      => 2000,
				'recovered'      => 550,
				'deaths'         => 121,
			]);
			$response = $this->get('dashboard/bycountry?sortNewCases=desc');
			$response->assertSeeTextInOrder(['Albania', 'Georgia']);
		}

		public function test_country_new_cases_sort_ascending()
		{
			$user = User::factory()->create([
				'email_verified_at' => now(),
			]);
			$this->actingAs($user);
			Country::create([
				'name'           => json_encode(['en' => 'Georgia', 'ka' => 'საქართველო']),
				'code'           => 'GE',
				'country'        => 'Georgia',
				'confirmed'      => 2000,
				'recovered'      => 550,
				'deaths'         => 121,
			]);
			Country::create([
				'name'           => json_encode(['en' => 'Albania', 'ka' => 'ალბანეთი']),
				'code'           => 'AL',
				'country'        => 'Albania',
				'confirmed'      => 5000,
				'recovered'      => 200,
				'deaths'         => 191,
			]);
			$response = $this->get('dashboard/bycountry?sortNewCases=asc');
			$response->assertSeeTextInOrder(['Georgia', 'Albania']);
		}

		public function test_country_deaths_sort_descending()
		{
			$user = User::factory()->create([
				'email_verified_at' => now(),
			]);
			$this->actingAs($user);
			Country::create([
				'name'           => json_encode(['en' => 'Albania', 'ka' => 'ალბანეთი']),
				'code'           => 'AL',
				'country'        => 'Albania',
				'confirmed'      => 5000,
				'recovered'      => 200,
				'deaths'         => 191,
			]);
			Country::create([
				'name'           => json_encode(['en' => 'Georgia', 'ka' => 'საქართველო']),
				'code'           => 'GE',
				'country'        => 'Georgia',
				'confirmed'      => 2000,
				'recovered'      => 550,
				'deaths'         => 121,
			]);
			$response = $this->get('dashboard/bycountry?sortDeaths=desc');
			$response->assertSeeTextInOrder(['Albania', 'Georgia']);
		}

		public function test_country_deaths_sort_ascending()
		{
			$user = User::factory()->create([
				'email_verified_at' => now(),
			]);
			$this->actingAs($user);
			Country::create([
				'name'           => json_encode(['en' => 'Georgia', 'ka' => 'საქართველო']),
				'code'           => 'GE',
				'country'        => 'Georgia',
				'confirmed'      => 2000,
				'recovered'      => 550,
				'deaths'         => 121,
			]);
			Country::create([
				'name'           => json_encode(['en' => 'Albania', 'ka' => 'ალბანეთი']),
				'code'           => 'AL',
				'country'        => 'Albania',
				'confirmed'      => 5000,
				'recovered'      => 200,
				'deaths'         => 191,
			]);
			$response = $this->get('dashboard/bycountry?sortDeaths=asc');
			$response->assertSeeTextInOrder(['Georgia', 'Albania']);
		}

		public function test_country_recovered_sort_descending()
		{
			$user = User::factory()->create([
				'email_verified_at' => now(),
			]);
			$this->actingAs($user);
			Country::create([
				'name'           => json_encode(['en' => 'Georgia', 'ka' => 'საქართველო']),
				'code'           => 'GE',
				'country'        => 'Georgia',
				'confirmed'      => 2000,
				'recovered'      => 550,
				'deaths'         => 121,
			]);
			Country::create([
				'name'           => json_encode(['en' => 'Albania', 'ka' => 'ალბანეთი']),
				'code'           => 'AL',
				'country'        => 'Albania',
				'confirmed'      => 5000,
				'recovered'      => 200,
				'deaths'         => 191,
			]);
			$response = $this->get('dashboard/bycountry?sortRecovered=desc');
			$response->assertSeeTextInOrder(['Georgia', 'Albania']);
		}

		public function test_country_recovered_sort_ascending()
		{
			$user = User::factory()->create([
				'email_verified_at' => now(),
			]);
			$this->actingAs($user);
			Country::create([
				'name'           => json_encode(['en' => 'Albania', 'ka' => 'ალბანეთი']),
				'code'           => 'AL',
				'country'        => 'Albania',
				'confirmed'      => 5000,
				'recovered'      => 200,
				'deaths'         => 191,
			]);
			Country::create([
				'name'           => json_encode(['en' => 'Georgia', 'ka' => 'საქართველო']),
				'code'           => 'GE',
				'country'        => 'Georgia',
				'confirmed'      => 2000,
				'recovered'      => 550,
				'deaths'         => 121,
			]);
			$response = $this->get('dashboard/bycountry?sortRecovered=asc');
			$response->assertSeeTextInOrder(['Albania', 'Georgia']);
		}
}
