<?php

namespace Melkerio\MailAuth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Melkerio\MailAuth\Models\MailUser;
use Melkerio\MailAuth\Models\LoginToken;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AuthenticatesUser
{
	use ValidatesRequests;

	protected $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function invite()
	{
		$this->validateRequest()
			->generateToken();
	}

	protected function validateRequest()
	{
		$this->validate($this->request, [
			'email' => 'required|email|exists:mail_users'
		]);

		return $this;
	}

	public static function generateToken($email)
	{
		$user = MailUser::whereEmail($email)->firstOrFail();

		$token = LoginToken::generateFor($user);

		return $token;
	}

	protected function send()
	{
		$user = MailUser::whereEmail($this->request->email)->firstOrFail();

		$url = route('mail-auth.confirm', ['token' => $user->login_token->token]);
		Mail::raw(
			"<a href='{$url}'>{$url}</a>",
			function($message) {
				$message->to($this->request->email)
						->subject('Login');
			}
		);
	}

	public function login(LoginToken $token)
	{
		Auth::guard('mail')->login($token->mail_user);
		// $token->delete();
	}
}
