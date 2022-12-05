<x-layouts.auth>
  <x-slot:title>
    @lang('Confirm password')
  </x-slot:title>

  <x-slot:subtitle>
    @lang('Please confirm your password')
  </x-slot:subtitle>

  <x-slot:form>
    <form wire:submit.prevent="confirm">
      <div class="grid grid-cols-1 gap-4">
        <x-forms.input :label="__('Password')" icon="ph-fingerprint" id="password" type="password" wire:model="password"/>

        <div class="flex items-center justify-end">
          <div class="text-sm leading-5">
            <x-link href="{{ route('password.request') }}">
              @lang('Forgot your password?')
            </x-link>
          </div>
        </div>

        <x-button class="mt-4" type="submit" primary>
          @lang('Confirm password')
        </x-button>
      </div>
    </form>
  </x-slot:form>
</x-layouts.auth>
