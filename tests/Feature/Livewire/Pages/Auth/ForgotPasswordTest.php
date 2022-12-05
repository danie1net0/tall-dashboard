<?php

use App\Http\Livewire\Pages\Auth\ForgotPassword;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;
use Livewire\Livewire;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\get;

beforeEach(function () {
    Notification::fake();
});

it('should see forgot password page', function () {
    get(route('password.request'))
        ->assertSuccessful()
        ->assertSeeLivewire(ForgotPassword::class);
});

it('should send password reset lin', function () {
    /** @var User $user */
    $user = User::factory()->create();

    Livewire::test(ForgotPassword::class)
        ->set('email', $user->email)
        ->call('sendResetPasswordLink')
        ->assertSuccessful();

    Notification::assertSentTo($user, ResetPassword::class);

    assertDatabaseHas('password_resets', ['email' => $user->email]);
});

it('should require an e-mail address', function () {
    Livewire::test(ForgotPassword::class)
        ->call('sendResetPasswordLink')
        ->assertHasErrors(['email' => 'required']);
});

it('should require a valid e-mail address', function () {
    Livewire::test(ForgotPassword::class)
        ->set('email', 'email')
        ->call('sendResetPasswordLink')
        ->assertHasErrors(['email' => 'email']);
});
