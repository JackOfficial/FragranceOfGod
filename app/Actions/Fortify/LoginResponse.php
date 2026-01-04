<?php

namespace App\Actions\Fortify;

use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        // Check roles
        if ($user->hasAnyRole(['admin', 'staff'])) {
            return redirect()->route('admin.dashboard'); // your admin panel route
        }

        // Normal users
        return redirect()->route('home'); // your home page route
    }
}
