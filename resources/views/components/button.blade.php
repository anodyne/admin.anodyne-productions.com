@if ($href)
  <a href="{{ $href }}" {{ $attributes->merge(['class' => "{$colorStyles()} {$sizeStyles()} {$baseStyles()}"]) }}>
    {{ $slot }}
  </a>
@else
  <button {{ $attributes->merge(['type' => 'button', 'class' => "{$colorStyles()} {$sizeStyles()} {$baseStyles()}"]) }}>
    {{ $slot }}
  </button>
@endif