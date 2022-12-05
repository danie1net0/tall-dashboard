@section('title', $title)

<div>
  <div x-data="{ sidebarOpen: false }" class="flex h-screen" x-cloak>
    <div class="flex-1 flex flex-col overflow-hidden">
      <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
        <div class="container min-h-full md:h-full mx-auto px-6 py-8">
          {{ $slot }}
        </div>
      </main>
    </div>
  </div>
</div>
