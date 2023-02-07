@php
  $features = [
    [
      'title' => 'All-in-one website',
      'content' => "A dedicated website with all of your content lets you easily show off your game to the world.",
      'icon' => 'flex-browser-favorite',
    ],
    [
      'title' => 'Easy character management',
      'content' => "Manage all of your game's characters in one place and let players take ownership of the characters they play.",
      'icon' => 'flex-theater-mask',
    ],
    [
      'title' => 'Tell your stories',
      'content' => "An integrated story and posting system gives you and your players the freedom to tell your game's stories.",
      'icon' => 'flex-book-edit',
    ],
    [
      'title' => 'Post locking',
      'content' => "Post locking intelligently locks and unlocks multi-author posts to help prevent your changes being overwritten.",
      'icon' => 'flex-lock-closed',
    ],
    [
      'title' => 'Reporting',
      'content' => "Get valuable insights into activity, posting levels, and even forecasting game activity for the rest of the month.",
      'icon' => 'flex-graph-dot',
    ],
    [
      'title' => 'Customize your way',
      'content' => "Change the way your site looks or works with tools to customize things any way you want.",
      'icon' => 'flex-wrench',
    ],
  ];
@endphp

<a name="features"></a>
<section id="features" class="relative pt-20 pb-14 sm:pb-20 sm:pt-32 lg:pb-32">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-2xl md:text-center">
      <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
        Powerful RPG management features
      </h2>
      <p class="mt-6 text-lg leading-8 text-slate-600">
        Simplify your RPG management with features and tools that will let
        you stop managing your game and start playing it again.
      </p>
    </div>

    <div class="mt-16 grid grid-cols-1 sm:grid-cols-3 sm:gap-x-8 gap-y-16">
      @foreach ($features as $feature)
        <div class="flex flex-col">
          <dt class="text-base font-semibold leading-7 text-slate-900">
            <div class="mb-6 flex h-12 w-12 items-center justify-center rounded-lg bg-slate-400">
              @svg($feature['icon'], 'h-7 w-7 text-white')
            </div>
            {{ $feature['title'] }}
          </dt>
          <dd class="mt-1 flex flex-auto flex-col text-base leading-7 text-slate-600">
            <p class="flex-auto">{{ $feature['content'] }}</p>
          </dd>
        </div>
      @endforeach
    </div>
  </div>
</section>