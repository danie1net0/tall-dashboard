@section('title', 'Redefinir Senha')

<x-layouts.auth>
  <x-slot:title>
    @lang('Reset password')
  </x-slot:title>

  <x-slot:subtitle>
    @lang('I remembered my password!')

    <x-link href="{{ route('login') }}">
      @lang('Sign in')
    </x-link>
  </x-slot:subtitle>

  <x-slot:form>
    <form wire:submit.prevent="resetPassword">
      <div class="grid grid-cols-1 gap-4">
        <input wire:model="token" type="hidden">

        <x-forms.input :label="__('E-mail')" name="user.email" type="email" wire:model="user.email"/>

        <x-forms.input :label="__('Password')" name="user.password" type="password" wire:model="user.password"/>

        <x-forms.input
          :label="__('Password confirmation')"
          name="user.password_confirmation"
          type="password"
          wire:model="user.password_confirmation"
        />

        <x-button class="mt-4" type="submit" primary>
          @lang('Reset password')
        </x-button>
      </div>
    </form>
  </x-slot:form>
</x-layouts.auth>
