<?php

namespace Melkerio\MailAuth\Models;

use Illuminate\Database\Eloquent\Model;

class LoginToken extends Model
{
    public function generateFor(User $user)
    {
    	# code...
    }
}
