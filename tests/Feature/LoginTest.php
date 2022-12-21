<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
	use RefreshDatabase;

	public function test_login_page_is_accessible()
	{
		$response = $this->get('/');
		$response->assertSuccessful();
	}

	public function test_login_give_errors_if_inputs_is_not_provided()
	{
		$response = $this->post('/');
		$response->assertSessionHasErrors(
			[
				'username',
				'password',
			]
		);
	}

	public function test_login_give_username_error_if_we_wont_provide_username()
	{
		$response = $this->post('/', [
			'password' => 'my-password',
		]);
		$response->assertSessionHasErrors(
			[
				'username',
			]
		);
	}

	public function test_login_give_password_error_if_we_wont_provide_password()
	{
		$response = $this->post('/', [
			'username' => 'sabalap',
		]);
		$response->assertSessionHasErrors(
			[
				'password',
			]
		);
	}

	public function test_login_give_credentials_error_when_user_with_username_does_not_exists()
	{
		$response = $this->post('/', [
			'username' => 'ragaca',
			'password' => 'paroli',
		]);

		$response->assertSessionHasErrors([
			'username',
		]);
	}

	public function test_login_give_credentials_error_when_user_with_email_does_not_exists()
	{
		$response = $this->post('/', [
			'username' => 'ragaca@gmail.com',
			'password' => 'paroli',
		]);

		$response->assertSessionHasErrors([
			'username',
		]);
	}

	public function test_login_redirect_to_dashboard_page_after_successful_login()
	{
		$username = 'sabalap';
		$password = 'password';

		User::factory()->create(
			[
				'username' => $username,
				'password' => bcrypt($password),
			]
		);

		$response = $this->post('/', [
			'username' => $username,
			'password' => $password,
		]);
		$response->assertRedirect('/dashboard');
	}

	public function test_logout_successfuly()
	{
		$username = 'sabalap';
		$password = 'password';

		User::factory()->create(
			[
				'username' => $username,
				'password' => bcrypt($password),
			]
		);

		$response = $this->post('/', [
			'username' => $username,
			'password' => $password,
		]);
		$response->assertRedirect('/dashboard');
		$response = $this->post('/logout', [
			'username' => $username,
			'password' => $password,
		]);
		$response->assertRedirect('/');
	}
}
