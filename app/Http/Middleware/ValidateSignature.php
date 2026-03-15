<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\EnsureEmailIsVerified;

class ValidateSignature extends \Illuminate\Routing\Middleware\ValidateSignature
{
    protected $except = [
        //
    ];
}
