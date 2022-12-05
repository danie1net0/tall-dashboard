<a {{ $attributes->class(['text-gray-700 group flex items-center px-4 py-2 text-sm']) }}>
  @if($icon)
    <x-icon class="text-xl text-gray-400 group-hover:text-gray-500 mr-3" :name="$icon"/>
  @endif

  @if($label)
    {{ $label }}
  @endif

  @if($slot)
    {{ $slot }}
  @endif
</a>
