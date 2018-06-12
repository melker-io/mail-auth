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

	public function loginForm()
	{
		return view('login');
	}
	public function login()
	{
		$this->auth->invite();

		dd($this);	
	}

	public function store()
	{
		$this->auth->invite();

		dd($this);
	}

	public function authenticate($token)
	{
		$token = LoginToken::where('token', $token)->first();
		$this->auth->login($token);

		// dd( \Illuminate\Support\Facades\Auth::guard('mail'), session(), \Illuminate\Support\Facades\Auth::user() );
		return redirect('/mail-home');
	}
}
