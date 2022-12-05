<?php

namespace App\Http\Livewire\Pages\Auth;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Redirector;

class ConfirmPassword extends Component
{
    public string $password = '';

    protected array $rules = [
        'password' => ['required', 'current_password'],
    ];

    public function render(): View
    {
        return view('livewire.pages.auth.confirm-password');
    }

    public function confirm(): RedirectResponse|Redirector
    {
        $this->validate();

        session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(route('home'));
    }
}
