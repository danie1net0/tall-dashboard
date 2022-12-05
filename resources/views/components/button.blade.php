<button
  {{ $attributes->class([
    'inline-flex items-center justify-center border font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2',
    'rounded-full' => $rounded,
    'rounded-md px-4 py-2 text-sm' => !$hasSize(),
    'rounded px-2.5 py-1.5 text-xs' => $xs,
    'rounded-md px-3 py-2 text-sm leading-4' => $sm,
    'rounded-md px-4 py-2 text-base' => $md,
    'rounded-md px-6 py-3 text-base' => $lg,
    'border-gray-300 bg-white text-gray-700 hover:bg-gray-50 focus:ring-gray-500' => !$hasColor(),
    'border-transparent bg-indigo-600 text-white hover:bg-indigo-700 focus:ring-indigo-500' => $primary,
    'border-transparent bg-gray-600 text-white hover:bg-gray-700 focus:ring-gray-500' => $secondary,
    'border-transparent bg-green-600 text-white hover:bg-green-700 focus:ring-green-500' => $success,
    'border-transparent bg-red-600 text-white hover:bg-red-700 focus:ring-red-500' => $danger,
    'border-transparent bg-yellow-600 text-white hover:bg-yellow-700 focus:ring-yellow-500' => $warning,
    'border-transparent bg-cyan-600 text-white hover:bg-cyan-700 focus:ring-cyan-500' => $info,
  ]) }}
>
  @if ($icon)
    <x-icon @class(['text-xl', 'mr-2' => !$circle]) :name="$icon"/>
  @endif

  {{ $slot }}

  @if ($rightIcon)
    <x-icon @class(['text-xl', 'ml-2' => !$circle]) :name="$rightIcon"/>
  @endif
</button>
