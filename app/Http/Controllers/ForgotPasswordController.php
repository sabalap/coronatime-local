<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewPassword;
use App\Http\Requests\ResetPassword;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
	public function submitForgetPasswordForm(ResetPassword $request)
	{
		$token = Str::random(64);

		DB::table('password_resets')->insert([
			'email'      => $request->email,
			'token'      => $token,
			'created_at' => Carbon::now(),
		]);
		Mail::send('emails.passwordResetEmail', ['token' => $token, 'email' => $request->email], function ($message) use ($request) {
			$message->to($request->email);
			$message->subject('Reset Password');
		});
		return redirect(route('sentEmailConfirmation'));
	}

	public function showResetPasswordForm($token, $email)
	{
		return view('components.after-password-email-confirmation', ['token' => $token, 'email' => $email]);
	}

	public function submitResetPasswordForm(NewPassword $request)
	{
		$updatePassword = DB::table('password_resets')->where([
			'email' => $request->email,
			'token' => $request->token,
		])
		->first();
		if (!$updatePassword)
		{
			return back()->withInput()->with('error', 'Invalid token!');
		}
		User::where('email', $request->email)->update(['password' => Hash::make($request->new_password)]);
		DB::table('password_resets')->where(['email' => $request->email])->delete();
		return redirect(route('password-changed'));
	}
}
