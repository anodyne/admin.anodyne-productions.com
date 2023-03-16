@props([
  'colors' => true,
])

<g>
  <path
    fill-rule="evenodd"
    clip-rule="evenodd"
    d="M169.806 5.905L127.731 47.98C130.219 52.772 129.455 58.815 125.433 62.836C120.465 67.806 112.408 67.806 107.44 62.836C102.471 57.867 102.471 49.811 107.44 44.842C111.461 40.822 117.503 40.057 122.295 42.545L164.37 0.469999L40.962 49.778L49.336 120.939L120.497 129.313L169.807 5.905H169.806Z" @class([
      'fill-purple-500' => $colors,
      'fill-current' => !$colors,
    ])
  />
  <path
    fill-rule="evenodd"
    clip-rule="evenodd"
    d="M120.496 129.312L49.336 120.939L107.439 62.836C112.41 67.807 120.462 67.807 125.433 62.836C129.454 58.816 130.219 52.776 127.727 47.98L169.805 5.903L120.496 129.313V129.312Z"
    @class([
      'fill-sky-400' => $colors,
      'fill-current' => !$colors,
    ])
  />
  <path
    fill-rule="evenodd"
    clip-rule="evenodd"
    d="M43.907 126.366L49.879 148.698L0.743988 169.53L21.576 120.395L43.907 126.366Z"
    @class([
      'fill-rose-500' => $colors,
      'fill-current' => !$colors,
    ])
  />
  <path
    fill-rule="evenodd"
    clip-rule="evenodd"
    d="M49.88 148.7L0.746002 169.528L43.908 126.365L49.88 148.7Z"
    @class([
      'fill-amber-500' => $colors,
      'fill-current' => !$colors,
    ])
  />
</g>