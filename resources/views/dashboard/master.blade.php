<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          @yield('titulo')
      </h2>
  </x-slot>

  {{-- .container.section --}}
  <div class="container py-4">
    @include('dashboard.partials.session-status')
    @yield('contenido')
  </div>  
</x-app-layout>