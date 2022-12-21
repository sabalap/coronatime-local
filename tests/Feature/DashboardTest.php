<?php

namespace Tests\Feature;

use App\Models\Country;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
	use RefreshDatabase;

	private User $user;

	protected function setUp(): void
	{
		parent::setUp();
		$this->user = User::factory()->create();
	}

   public function test_visit_dashboard_page_successfully()
   {
   	Country::create([
   		'name'           => json_encode(['en' => 'Georgia', 'ka' => 'საქართველო']),
   		'code'           => 'GE',
   		'country'        => 'Georgia',
   		'confirmed'      => 2000,
   		'recovered'      => 550,
   		'deaths'         => 121,
   	]);
   	$response = $this->actingAs($this->user)->get('dashboard');
   	$response->assertSuccessful();
   }

   public function test_visit_by_country_page_successfully()
   {
   	$response = $this->actingAs($this->user)->get('dashboard/bycountry');
   	$response->assertSuccessful();
   }
}
