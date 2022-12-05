<div
  class="pointer-events-auto w-full max-w-sm overflow-hidden border rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5"
  x-bind:class="{
    'border-green-400': notification.type === '{{ \App\Support\Enums\NotifyType::SUCCESS }}',
    'border-red-400': notification.type === '{{ \App\Support\Enums\NotifyType::ERROR }}',
    'border-yellow-400': notification.type === '{{ \App\Support\Enums\NotifyType::WARNING }}',
    'border-cyan-400': notification.type === '{{ \App\Support\Enums\NotifyType::INFO }}',
    'border-gray-400': notification.type === '{{ \App\Support\Enums\NotifyType::QUESTION }}',
  }"
>
  <div class="p-4">
    <div class="flex items-start">
      <div class="flex-shrink-0">
        <x-icon
          class="text-green-400 text-2xl"
          name="ph-check-circle"
          x-show="notification.type === '{{ \App\Support\Enums\NotifyType::SUCCESS }}'"
        />

        <x-icon
          class="text-red-400 text-2xl"
          name="ph-bug-beetle"
          x-show="notification.type === '{{ \App\Support\Enums\NotifyType::ERROR }}'"
        />

        <x-icon
          class="text-yellow-400 text-2xl"
          name="ph-warning"
          x-show="notification.type === '{{ \App\Support\Enums\NotifyType::WARNING }}'"
        />

        <x-icon
          class="text-cyan-400 text-2xl"
          name="ph-info"
          x-show="notification.type === '{{ \App\Support\Enums\NotifyType::INFO }}'"
        />

        <x-icon
          class="text-gray-400 text-2xl"
          name="ph-question"
          x-show="notification.type === '{{ \App\Support\Enums\NotifyType::QUESTION }}'"
        />
      </div>

      <div class="ml-3 w-0 flex-1 pt-0.5">
        <p class="text-sm font-medium text-gray-900" x-text="notification.content.title"></p>
        <p class="mt-1 text-sm text-gray-500" x-text="notification.content.description"></p>
      </div>

      <div class="ml-4 flex flex-shrink-0">
        <button
          @click="remove(notification.id)"
          class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2"
          type="button"
        >
          <x-icon class="p-0.5 text-base" name="ph-x-bold"/>

          <span class="sr-only">
            Close
          </span>
        </button>
      </div>
    </div>
  </div>
</div>
