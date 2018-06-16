<?php

namespace Melkerio\MailAuth\Http\Controllers;

use App\Http\Controllers\Controller;
use Melkerio\MailAuth\AuthenticatesUser;
use Melkerio\MailAuth\Models\LoginToken;

class MailAuthController extends Controller
{
	protected $auth;

	protected function guard()
	{
	    return Auth::guard('mail-auth');
	}

	public function __construct(AuthenticatesUser $auth)
	{
		$this->auth = $auth;
	}

	public function login($token)
	{
		$token = LoginToken::where('token', $token)->firstOrFail();
		$this->auth->login($token);

		return redirect(config('mail-auth.login-redirect'));
	}
}
