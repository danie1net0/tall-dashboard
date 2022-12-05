<div
  class="relative inline-block text-left"
  x-data="dropdown"
  x-on:keydown.escape.prevent.stop="close($refs.button)"
  x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
  x-id="['dropdown-button']"
>
  <div
    :aria-expanded="isOpen"
    :aria-controls="$id('dropdown-button')"
    aria-haspopup="true"
    class="flex justify-center items-center"
    type="button"
    x-on:click="toggle()"
    x-ref="button"
  >
    {{ $trigger}}
  </div>

  <div
    aria-labelledby="menu-button"
    aria-orientation="vertical"
    :id="$id('dropdown-button')"
    class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
    role="menu"
    tabindex="-1"
    x-on:click.outside="close($refs.button)"
    x-transition.origin.top.left
    x-ref="panel"
    x-show="isOpen"
  >
    <div class="py-1" role="none">
      {{ $slot }}
    </div>
  </div>
</div>
