<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResetPassword extends FormRequest
{
	public function rules()
	{
		return [
			'email'                 => ['required', 'email', Rule::exists('users', 'email')],
		];
	}

	public function messages()
	{
		return [
			'email.required'                      => __('register.email_required'),
			'email.exists'                        => __('register.email_exists'),
		];
	}
}
