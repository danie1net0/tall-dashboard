@section('title', $title)

<div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8 mx-4 md:mx-0">
  <div class="sm:mx-auto sm:w-full sm:max-w-md">
    <a href="{{ route('auth.login') }}" class="focus:outline-none w-full text-center flex justify-center">
      <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
    </a>

    <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">
      @isset ($title)
        {{ $title }}
      @endif
    </h2>

    <p class="mt-2 text-sm text-center text-gray-600 leading-5 max-w">
      @isset ($subtitle)
        {{ $subtitle }}
      @endif
    </p>
  </div>

  <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
    <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
      @isset ($form)
        {{ $form }}
      @endif
    </div>
  </div>
</div>
