<div
  @notify.window="add($event)"
  aria-live="polite"
  class="fixed top-0 right-0 flex w-full flex-col items-end space-y-4 pr-4 pb-4 sm:justify-start"
  role="status"
  x-data="notifications"
>
  <template x-for="notification in notifications" :key="notification.id">
    <div
      class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5"
      x-show="visible.includes(notification)"
      x-transition.duration.500ms
    >
      <x-notifications.notification/>
    </div>
  </template>
</div>
