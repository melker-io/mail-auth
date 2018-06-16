<?php

namespace Melkerio\MailAuth;

use Melkerio\MailAuth\AuthenticatesUser;

class MailAuth
{
	protected $auth;

	public function __construct(AuthenticatesUser $auth)
	{
		$this->auth = $auth;
	}

	public static function generateInvite($email)
	{
		$token = AuthenticatesUser::generateToken($email);
		$url = static::generateLoginUrl($token);

		return $url;
	}

	public function firstOrCreate($email)
	{
		return MailUser::firstOrCreate([
			'email' => $email,
		]);
	}

	protected static function generateLoginUrl($token)
	{
		$url = route('mail-auth.token-login', ['token' => $token]);
		return $url;
	}
}
