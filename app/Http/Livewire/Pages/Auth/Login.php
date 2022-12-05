<?php

namespace App\Http\Livewire\Pages\Auth;

use App\Actions\Auth\LoginAction;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\MessageBag;
use Illuminate\Contracts\View\View;
use Livewire\{Component, Redirector};

class Login extends Component
{
    public string $email = '',  $password = '';
    public bool $remember = false;

    protected array $rules = [
        'email' => ['required', 'email'],
        'password' => ['required', 'string'],
    ];

    public function render(): View
    {
        return view('livewire.pages.auth.login');
    }

    public function authenticate(LoginAction $action): Redirector|RedirectResponse|MessageBag
    {
        try {
            $action->execute($this->validate(), $this->remember);
        } catch (AuthenticationException $exception) {
            return $this->addError('email', $exception->getMessage());
        }

        return redirect()->intended(route('dashboard.home'));
    }
}
