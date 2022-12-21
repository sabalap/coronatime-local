<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewPassword extends FormRequest
{
	public function rules()
	{
		return [
			'new_password'          => ['required',  'min:3', Rule::unique('users', 'password')],
			'password_confirmation' => ['required', 'same:new_password'],
		];
	}

	public function messages()
	{
		return [
			'new_password.required'               => __('register.new_password_required'),
			'new_password.unique'                 => __('register.new_password_unique'),
			'new_password.min'                    => __('register.new_password_min'),
			'password_confirmation.required'      => __('register.password_confirmation_required'),
			'password_confirmation.same'          => __('register.password_confirmation_same_password'),
		];
	}
}
