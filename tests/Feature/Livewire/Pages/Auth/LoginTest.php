<?php

use App\Http\Livewire\Pages\Auth\Login;
use App\Models\User;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertAuthenticatedAs;
use function Pest\Laravel\get;

uses()->group('auth', 'login', 'livewire');

beforeEach(function () {
    $this->user = User::factory()->create();
});


it('should see login page', function () {
    get(route('login'))
        ->assertSuccessful()
        ->assertSeeLivewire(Login::class);
});

it('should redirect to dashboard if user already logged in', function () {
    actingAs(User::factory()->create())
        ->get(route('login'))
        ->assertRedirect(route('dashboard.home'));
});

it('should login and redirect to dashboard', function () {
    Livewire::test(Login::class)
        ->set('email', $this->user->email)
        ->set('password', 'password')
        ->call('authenticate');

    assertAuthenticatedAs($this->user);
});

it('should bad login with wrong credentials', function () {
    Livewire::test(Login::class)
        ->set('email', $this->user->email)
        ->set('password', 'wrong-password')
        ->call('authenticate')
        ->assertHasErrors('email')
        ->assertNoRedirect();

    expect(auth()->check())->toBeFalse();
});

it('should ensure that an inactive user cannot login', function () {
    /** @var User $user */
    $user = User::factory()
        ->inactive()
        ->create();

    Livewire::test(Login::class)
        ->set('email', $user->email)
        ->set('password', 'wrong-password')
        ->call('authenticate')
        ->assertHasErrors('email')
        ->assertNoRedirect();

    expect(auth()->check())->toBeFalse();
});
