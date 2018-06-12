<?php

namespace Melkerio\MailAuth\Models;

use Melkerio\MailAuth\Models\MailUser;
use Illuminate\Database\Eloquent\Model;
use Melkerio\MailAuth\Models\LoginToken;

class LoginToken extends Model
{
	protected $fillable = [
		'user_id',
		'token',
	];

	public function getRouteKeyName()
	{
		return 'token';
	}

    public static function generateFor(MailUser $user)
    {
    	$token = new static;
    	$token->token = str_random(50);
    	$token->mail_user_id = $user->id;
    	$user->login_token()->save($token);

    	return $token;
    }

    public function mail_user()
    {
    	return $this->belongsTo(MailUser::class);
    }
}
