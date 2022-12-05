<?php

namespace App\Actions\Auth;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\Builder;

class LoginAction
{
    /** @throws AuthenticationException */
    public function execute(array $credentials, bool $remember = false): bool
    {
        $attempt = auth()->attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'is_active' => true,
            fn (Builder $query) => $query->whereNotNull('email_verified_at'),
        ], $remember);

        if (!$attempt) {
            throw new AuthenticationException(__('auth.failed'));
        }

        session()->regenerate();

        return true;
    }
}
