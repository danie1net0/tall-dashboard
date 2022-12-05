<?php

namespace App\Http\Livewire\Pages\Auth;

use App\Models\User;
use App\View\Traits\Actions;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ResetPassword extends Component
{
    use Actions;

    public User $user;
    public string $token;

    protected array $rules = [
        'token' => ['required', 'string'],
        'user.email' => ['required', 'email'],
        'user.password' => ['required', 'min:8', 'same:user.password_confirmation'],
        'user.password_confirmation' => ['required', 'min:8'],
    ];

    public function mount(Request $request, string $token): void
    {
        $this->user = new User();
        $this->user->email = $request->email ?? '';
        $this->token = $token;
    }

    public function hydrate(): void
    {
        $this->user->makeVisible('password');
    }

    public function render(): View
    {
        return view('livewire.pages.auth.reset-password');
    }

    public function resetPassword()
    {
        $this->validate();

        $credentials = [
            'token' => $this->token,
            'email' => $this->user->email,
            'password' => $this->user->password
        ];

        $response = Password::reset($credentials, static function (User $user, string $password) {
            $user = tap($user)->update([
                'password' => Hash::make($password),
            ]);

            Auth::login($user, true);
        });

        if ($response === Password::PASSWORD_RESET) {
            return redirect(route('dashboard.home'));
        }

        $this->notification()->error('Oops', trans($response));
    }
}
