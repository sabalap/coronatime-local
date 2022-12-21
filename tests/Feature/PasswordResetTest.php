<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
	use RefreshDatabase;

	use WithFaker;

	public function test_password_forgot_page_is_accessible()
	{
		$this
			->get(route('forget.password.get'))
			->assertSuccessful()
			->assertSee(__('register.reset_password'));
	}

	public function test_password_reset_link_send_successfuly()
	{
		User::factory()->create([
			'email' => 'saba@gmail.com',
		]);

		$response = $this->post('forget-password', [
			'email' => 'saba@gmail.com',
		]);

		$response->assertStatus(302)->assertRedirect('sent-confirmation');
	}

	public function test_show_password_reset_page()
	{
		$user = User::factory()->create();
		$token = Password::broker()->createToken($user);
		$this
			->get(route('reset.password.get', [
				'token' => $token,
				'email' => $user->email,
			]))
			->assertSuccessful();
	}

public function test_submit_password_reset()
{
	$user = User::factory()->create([
		'password' => bcrypt('12345678'),
	]);
	$this->post(route('forget.password.post'), [
		'email' => $user->email,
	]);
	$token = DB::table('password_resets')->where('email', $user->email)->first()->token;

	$this->actingAs($user)->post(route('reset.password.post'), [
		'token'                     => $token,
		'email'                     => $user->email,
		'new_password'              => 'paroli',
		'password_confirmation'     => 'paroli',
	])->assertRedirect(route('password-changed'));
}

public function test_submit_password_reset_invalid()
{
	$user = User::factory()->create([
		'password' => bcrypt('12345678'),
	]);

	$this->post(route('forget.password.post'), [
		'email' => 'ragaca@gmail.com',
	]);
	$token = Password::broker()->createToken($user);

	$this->actingAs($user)->post(route('reset.password.post'), [
		'token'                     => $token,
		'email'                     => $user->email,
		'new_password'              => 'paroli',
		'password_confirmation'     => 'paroli',
	])->assertStatus(302);
}
}
