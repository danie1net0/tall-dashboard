<?php

namespace App\Http\Livewire\Pages\Auth;

use App\View\Traits\Actions;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ForgotPassword extends Component
{
    use Actions;

    public string $email = '';

    protected array $rules = [
        'email' => ['required', 'email'],
    ];

    public function render(): View
    {
        return view('livewire.pages.auth.forgot-password');
    }

    public function sendResetPasswordLink(): void
    {
        $this->validate();

        Password::sendResetLink(['email' => $this->email]);

        $this->reset('email');

        $this->notification()->success(
            __('Success!'),
            __(Password::RESET_LINK_SENT),
        );
    }
}
