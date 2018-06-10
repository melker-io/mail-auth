<?php

namespace Melkerio\MailAuth;

use Illuminate\Http\Request;
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
			->generateToken()
			->send();
	}

	protected function validateRequest()
	{
		$this->validate($this->request, [
			'email' => 'required|email|exists:mail_users'
		]);
	}

	public function generateToken()
	{
		$user = MailUser::byEmail($this->request->email);
		
		LoginToken::genereateFor($user);

	}
}
