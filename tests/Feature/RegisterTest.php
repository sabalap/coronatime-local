<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
	use RefreshDatabase;

	public function test_register_page_is_accessible()
	{
		$response = $this->get('/register');
		$response->assertSuccessful();
	}

	public function test_register_user_successfuly()
	{
		$this->post('/register', [
			'username'                  => 'sabalap',
			'email'                     => 'saba@gmail.com',
			'password'                  => 'paroli',
			'password_confirmation'     => 'paroli',
		]);

		$this->assertDatabaseHas('users', [
			'email' => 'saba@gmail.com',
		]);
	}

	public function test_email_is_verified_successfully()
	{
		$user = User::factory()->unverified()->create();
		$token = Str::random(64);
		UserVerify::create([
			'user_id' => $user->id,
			'token'   => $token,
		]);
		$token = UserVerify::where('token', $token)->first()->token;
		$this->get(route('user.verify', $token))->assertRedirect(route('afterEmailConfirmation'));
	}
}
