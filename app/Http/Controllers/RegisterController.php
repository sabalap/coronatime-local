<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUser;
use App\Models\User;
use App\Models\UserVerify;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
	public function storeRegister(RegisterUser $request)
	{
		$user = User::create([
			'username'                 => $request->username,
			'email'                    => $request->email,
			'password'                 => bcrypt($request->password),
			'password_confirmation'    => bcrypt($request->password_confirmation),
		]);
		$token = Str::random(64);
		UserVerify::create([
			'user_id' => $user->id,
			'token'   => $token,
		]);
		Mail::send('emails.emailVerificationEmail', ['token' => $token], function ($message) use ($request) {
			$message->to($request->email);
			$message->subject('Email Verification Mail');
		});
		return redirect()->route('sentEmailConfirmation');
	}

	public function verifyAccount($token)
	{
		$verifyUser = UserVerify::where('token', $token)->first();
		if (!is_null($verifyUser))
		{
			$user = $verifyUser->user;
			if (!$user->email_verified_at)
			{
				$verifyUser->user->email_verified_at = Carbon::now();
				$verifyUser->user->save();
			}
		}
		return redirect()->route('afterEmailConfirmation');
	}
}
