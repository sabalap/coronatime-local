<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUser extends FormRequest
{
	public function rules()
	{
		return [
			'username'        => ['required'],
			'password'        => ['required'],
		];
	}

	public function messages()
	{
		return [
			'username.required'                   => __('register.username_required'),
			'password.required'                   => __('register.password_required'),
		];
	}
}
