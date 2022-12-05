@php
  $model = $attributes->wire('model');
  $hasError = $errors->has($model->value);
@endphp

<div>
  <div class="flex items-center">
    <input
      type="checkbox"
      wire:ignore
      {{ $model->value }}
      {{ $attributes->class([
        'h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500',
        'border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500' => $hasError,
        'mr-2' => $label,
      ]) }}
    >

    @isset($label)
      <x-forms.label for="{{ $attributes->get('id') ?? $model->value }}">
        {{ $label }}
      </x-forms.label>
    @endisset
  </div>

  <x-forms.error :field="$model"/>
</div>
