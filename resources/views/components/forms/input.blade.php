@php
  $model = $attributes->wire('model');
  $hasError = $errors->has($model->value);
@endphp

<div>
  @isset($label)
    <x-forms.label for="{{ $attributes->get('id') ?? $model->value }}">
      {{ $label }}
    </x-forms.label>
  @endisset

  <div class="relative mt-1 rounded-md shadow-sm" @class(['mt-1' => $label])>
    @if($icon)
      <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
        <x-icon @class(['text-xl', 'text-gray-400' => !$hasError, 'text-red-500' => $hasError]) :name="$icon"/>
      </div>
    @endif

    <input
      {{ $model->value }}
      {{ $attributes->class([
        'block w-full rounded-md border px-3 py-2 shadow-sm sm:text-sm focus:outline-none',
        'border-gray-300 placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500' => !$hasError,
        'border-red-300 placeholder-red-300 focus:border-red-500 focus:ring-red-500 pr-10 text-red-900' => $hasError,
        'pl-10' => $icon,
      ]) }}
    >

    @if($hasError)
      <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
        <x-icon class="text-xl text-red-500" name="ph-warning-circle-fill"/>
      </div>
    @endif
  </div>

  <x-forms.error :field="$model"/>
</div>
