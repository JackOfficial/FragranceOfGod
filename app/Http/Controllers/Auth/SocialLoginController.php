<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class SocialLoginController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->stateless()->user();

            // Update or create user
            $user = User::updateOrCreate(
                ['email' => $socialUser->getEmail()],
                [
                    'name' => $socialUser->getName() ?? $socialUser->getNickname(),
                    'password' => bcrypt(str()->random(16)),
                    'avatar' => $socialUser->getAvatar(),
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                ]
            );

            // Assign role if newly created
            if ($user->wasRecentlyCreated) {
                $user->assignRole('user'); // default role
            }

            // Mark email verified
            if (is_null($user->email_verified_at)) {
                $user->markEmailAsVerified();
            }

            // Login
            Auth::login($user, true);

            // Centralized redirect
            return app(\Laravel\Fortify\Contracts\LoginResponse::class)
                       ->toResponse(request());

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Social login failed. Please try again.');
        }
    }
}
