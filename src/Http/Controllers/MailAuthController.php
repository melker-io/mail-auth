<?php

namespace Melkerio\MailAuth\Http\Controllers;

use App\Http\Controllers\Controller;
use Melkerio\MailAuth\AuthenticatesUser;

class MailAuthController extends Controller
{
	public function store(AuthenticatesUser $auth)
	{
		$auth->invite();

		dd($this);
	}
}
