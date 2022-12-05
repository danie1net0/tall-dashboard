<?php

use App\Http\Livewire\Pages\Auth\ResetPassword;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Livewire\Livewire;
use function Pest\Laravel\get;

beforeEach(function () {
    Notification::fake();
});

it('should see reset password page', function () {
    /** @var User $user */
    $user = User::factory()->create();

    DB::table('password_resets')->insert([
        'email' => $user->email,
        'token' => Hash::make($token = Str::random()),
        'created_at' => Carbon::now(),
    ]);

    $attributes = [
        'email' => $user->email,
        'token' => $token,
    ];

    get(route('password.reset', $attributes))
        ->assertSuccessful()
        ->assertSee($user->email)
        ->assertSeeLivewire(ResetPassword::class);
});

it('should reset password', function () {
    /** @var User $user */
    $user = User::factory()->create();

    DB::table('password_resets')->insert([
        'email' => $user->email,
        'token' => Hash::make($token = Str::random()),
        'created_at' => Carbon::now(),
    ]);

    Livewire::test(ResetPassword::class, ['token' => $token])
        ->set('user.email', $user->email)
        ->set('user.password', $newPassword = Str::random(8))
        ->set('user.password_confirmation', $newPassword)
        ->call('resetPassword');

    expect(Hash::check($newPassword, $user->refresh()->password))->toBeTrue()
        ->and(Auth::attempt(['email' => $user->email, 'password' => $newPassword]))->toBeTrue();
});

it('should require token', function () {
    Livewire::test(ResetPassword::class, ['token' => ''])
        ->call('resetPassword')
        ->assertHasErrors(['token' => 'required']);
});

it('should require an e-mail address', function () {
    Livewire::test(ResetPassword::class, ['token' => Str::random()])
        ->call('resetPassword')
        ->assertHasErrors(['user.email' => 'required']);
});

it('should require a valid e-mail address', function () {
    Livewire::test(ResetPassword::class, ['token' => Str::random()])
        ->set('user.email', 'email')
        ->call('resetPassword')
        ->assertHasErrors(['user.email' => 'email']);
});

it('should require password', function () {
    Livewire::test(ResetPassword::class, ['token' => Str::random()])
        ->set('user.password', '')
        ->call('resetPassword')
        ->assertHasErrors(['user.password' => 'required']);
});

it('should require password with minimum of eight characters', function () {
    Livewire::test(ResetPassword::class, ['token' => Str::random()])
        ->set('user.password', Str::random(6))
        ->call('resetPassword')
        ->assertHasErrors(['user.password' => 'min']);
});

it('should require that password matches with password confirmation', function () {
    Livewire::test(ResetPassword::class, ['token' => Str::random()])
        ->set('user.password', Str::random(6))
        ->call('resetPassword')
        ->assertHasErrors(['user.password' => 'min']);
});
