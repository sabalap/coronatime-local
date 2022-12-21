<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LanguageTest extends TestCase
{
	use RefreshDatabase;

	public function test_change_language_from_english_to_georgian()
	{
		$response = $this->get('/lang/ka');

		$response->assertSessionHas('applocale', 'ka');
	}

	public function test_change_language_from_georgian_to_english()
	{
		$response = $this->get('/lang/en');

		$response->assertSessionHas('applocale', 'en');
	}
}
