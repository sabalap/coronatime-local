<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterUser extends FormRequest
{
	public function rules()
	{
		return [
			'username'              => ['required', 'min:3', Rule::unique('users', 'username')],
			'email'                 => ['required', 'email', Rule::unique('users', 'email')],
			'password'              => ['required', 'min:3'],
			'password_confirmation' => ['required', 'same:password'],
		];
	}

	public function messages()
	{
		return [
			'username.required'                   => __('register.username_required'),
			'username.min'                        => __('register.username_min'),
			'username.unique'                     => __('register.username_unique'),
			'email.required'                      => __('register.email_required'),
			'email.unique'                        => __('register.email_unique'),
			'password.required'                   => __('register.password_required'),
			'password.min'                        => __('register.password_min'),
			'password_confirmation.required'      => __('register.password_confirmation_required'),
			'password_confirmation.same'          => __('register.password_confirmation_same_password'),
		];
	}
}
