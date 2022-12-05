<?php

use App\Http\Livewire\Pages\Auth\ConfirmPassword;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use function Pest\Laravel\followingRedirects;
use function Pest\Laravel\get;
use function Pest\Laravel\withSession;

beforeEach(function () {
    $this->actingAs(User::factory()->create());

    Route::middleware(['web', 'password.confirm'])
        ->get('/must-be-confirmed', fn () => 'You must be confirmed to see this page.');
});

it('should see confirm password page', function () {
    get('/must-be-confirmed')->assertRedirect(route('password.confirm'));

    followingRedirects()
        ->get('/must-be-confirmed')
        ->assertSeeLivewire(ConfirmPassword::class);
});

it('should require password', function () {
    Livewire::test(ConfirmPassword::class)
        ->call('confirm')
        ->assertHasErrors(['password' => 'required']);
});

it('should fail if password is wrong', function () {
    Livewire::test(ConfirmPassword::class)
        ->set('password', 'wrong-password')
        ->call('confirm')
        ->assertHasErrors(['password' => 'current_password']);
});

it('should redirect when password is confirmed', function () {
    withSession(['url.intended' => '/must-be-confirmed']);

    Livewire::test(ConfirmPassword::class)
        ->set('password', 'password')
        ->call('confirm')
        ->assertRedirect('/must-be-confirmed');
});
