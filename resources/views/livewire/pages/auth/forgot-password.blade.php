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
    <form wire:submit.prevent="sendResetPasswordLink">
      <div class="grid grid-cols-1 gap-4">
        <x-forms.input icon="ph-at" :label="__('E-mail')" name="email" type="email" wire:model="email"/>

        <x-button class="mt-4" type="submit" primary>
          @lang('Send reset password link')
        </x-button>
      </div>
    </form>
  </x-slot:form>
</x-layouts.auth>
