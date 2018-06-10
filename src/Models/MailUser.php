<?php 

namespace Melkerio\MailAuth\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class MailUser extends Authenticatable
{
	protected $guard = ['mail'];
	protected $fillable = ['email'];

	public function byEmail($email)
	{
		return static::where('email', $email)->firstOrFail();
	}
}
