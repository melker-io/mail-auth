<?php 

namespace Melkerio\MailAuth\Models;

use Melkerio\MailAuth\Models\LoginToken;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MailUser extends Authenticatable
{
	protected $guard = 'mail';
	protected $fillable = ['email'];

	public static function whereEmail($email)
	{
		return static::where('email', $email)->firstOrFail();
	}

	public function login_token()
	{
		return $this->hasOne(LoginToken::class, 'mail_user_id');
	}
}
