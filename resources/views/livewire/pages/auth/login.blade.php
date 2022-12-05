<x-layouts.auth>
  <x-slot:title>
    @lang('Sign in to your account')
  </x-slot:title>

  <x-slot:subtitle>
    @lang('Or')

    <x-link href="{{ route('login') }}">
      @lang('create a new account')
    </x-link>
  </x-slot:subtitle>

  <x-slot:form>
    <form wire:submit.prevent="authenticate">
      <div class="grid grid-cols-1 gap-4">
        <x-forms.input :label="__('E-mail')" id="email" wire:model="email" icon="ph-at"/>

        <x-forms.input type="password" :label="__('Password')" id="password" wire:model="password" icon="ph-fingerprint"/>

        <div class="flex items-center justify-between mb-4">
          <x-forms.checkbox :label="__('Remember-me')" id="remember" wire:model="remember"/>

          <div class="text-sm leading-5">
            <x-link href="{{ route('password.request') }}">
              @lang('Forgot your password?')
            </x-link>
          </div>
        </div>

        <x-button type="submit" primary>
          @lang('Sign in')
        </x-button>
      </div>
    </form>
  </x-slot:form>
</x-layouts.auth>
