<?php

use App\Actions\Auth\LoginAction;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use function Pest\Laravel\assertAuthenticatedAs;

uses()->group('auth', 'actions');

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->action = new LoginAction();
});

it ('should login', function () {
    $isAuthenticated = $this->action->execute([
        'email' => $this->user->email,
        'password' => 'password',
    ]);

    expect($isAuthenticated)->toBeTrue()
        ->and(assertAuthenticatedAs($this->user))
        ->and(auth()->user()?->getRememberToken())->toBeEmpty();
});

it ('should login remembering', function () {
    $isAuthenticated = $this->action->execute([
        'email' => $this->user->email,
        'password' => 'password',
    ], true);

    expect($isAuthenticated)->toBeTrue()
        ->and(assertAuthenticatedAs($this->user))
        ->and(auth()->user()?->getRememberToken())->toBeString();
});

it('should fail if credentials are invalid', function () {
    $this->action->execute([
        'email' => $this->user->email,
        'password' => 'wrong-password',
    ]);
})->throws(AuthenticationException::class);

it('should fail if registration has not been verified', function () {
    /** @var User $user */
    $user = User::factory()
        ->unverified()
        ->create();

    $this->action->execute([
        'email' => $user->email,
        'password' => 'password',
    ]);
})->throws(AuthenticationException::class);

it('should fail if user is inactive', function () {
    /** @var User $user */
    $user = User::factory()
        ->inactive()
        ->create();

    $this->action->execute([
        'email' => $user->email,
        'password' => 'password',
    ]);
})->throws(AuthenticationException::class);

