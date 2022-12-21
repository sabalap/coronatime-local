<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUser;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
	public function login(User $user, LoginUser $request)
	{
		$loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL);
		if ($loginType)
		{
			$loginType = 'email';
		}
		else
		{
			$loginType = 'username';
		}
		$user = [
			$loginType  => $request->username,
			'password'  => $request->password,
		];
		if (!auth()->attempt(($user)))
		{
			throw ValidationException::withMessages([
				'username' => __('login.username_is_not_correct'),
			]);
		}
		session()->regenerate();
		return redirect(route('dashboard'));
	}

	public function logout()
	{
		auth()->logout();
		return redirect(route('createLogin'));
	}
}
