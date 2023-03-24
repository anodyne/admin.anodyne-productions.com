@props([
  'dark' => false,
])

<button
  class="flex items-center space-x-3 w-full p-2 font-medium"
  {{ $attributes->merge(['type' => 'button']) }}
>
  {{ $slot }}
</button>