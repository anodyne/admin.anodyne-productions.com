@props([
  'items',
  'title',
  'section',
])

<div
  class="fixed top-0 z-40 w-full backdrop-blur-sm dark:backdrop-blur flex-none transition-colors duration-500 lg:z-50 lg:border-b lg:border-slate-900/10 dark:border-slate-50/[0.06] bg-white/[var(--bg-opacity-light)] dark:bg-slate-900/[var(--bg-opacity-dark)]"
  style="--bg-opacity-light:0.5; --bg-opacity-dark:0.2;"
>
  <div class="max-w-8xl mx-auto">
    <div class="py-4 border-b border-slate-900/10 lg:px-8 lg:border-0 dark:border-slate-300/10 mx-4 lg:mx-0">
      <div class="relative flex items-center">
        <div class="flex items-center space-x-3">
          <a class="flex-none w-[2.0625rem] overflow-hidden md:w-auto" href="/">
            <span class="sr-only">Nova home page</span>
            <x-logos.nova class="hidden md:block text-slate-700 dark:text-white w-auto h-7"></x-logos.nova>
            <x-logos.nova.mark class="block md:hidden w-auto h-8"></x-logos.nova.mark>
          </a>

          {{ $trailingLogo ?? '' }}
        </div>

        <div class="relative hidden lg:flex items-center ml-auto">
          <nav class="text-sm leading-6 font-medium text-slate-700 dark:text-slate-200">
            <ul class="flex space-x-8">
              @foreach ($items as $item)
                <li>
                  <a class="hover:text-purple-500 dark:hover:text-purple-400" href="{{ $item['href'] }}">
                    {{ $item['title'] }}
                  </a>
                </li>
              @endforeach
            </ul>
          </nav>

          <div class="flex items-center border-l border-slate-200 ml-6 pl-6 dark:border-slate-700" x-data="{ ...appearanceModeToggle(), open: false }">
            <div class="relative" x-menu x-model="open">
              <label class="sr-only">Theme</label>
              <button x-menu:button type="button" aria-haspopup="true" aria-expanded="false" class="flex items-center">
                <span class="dark:hidden">
                  @svg('flex-weather-sun', 'w-5 h-5 text-purple-500')
                </span>
                <span class="hidden dark:inline">
                  @svg('flex-weather-moon', 'w-5 h-5 text-purple-500')
                </span>
              </button>

              <div
                x-menu:items
                x-transition.origin.top.right
                class="absolute top right-0 w-40 mt-2 z-10 origin-top-right bg-white dark:bg-slate-800 shadow-md ring-1 ring-slate-900/10 dark:ring-0 dark:highlight-white/5 rounded-lg outline-none p-1 font-medium"
                x-cloak
              >
                <button
                  x-menu:item
                  type="button"
                  @click="setMode('light');open = false;"
                  @class([
                    'flex items-center w-full px-3 py-1.5 text-sm transition-colors rounded-md hover:bg-slate-100 dark:hover:bg-slate-700 space-x-2',
                  ])
                  :class="{ 'text-purple-500': isLightModeSelected(), 'text-slate-500 dark:text-gray-400': !isLightModeSelected() }"
                >
                  @svg('flex-weather-sun', 'w-5 h-5')
                  <span>Light</span>
                </button>
                <button
                  x-menu:item
                  type="button"
                  @click="setMode('dark');open = false;"
                  @class([
                    'flex items-center w-full px-3 py-1.5 text-sm transition-colors rounded-md hover:bg-slate-100 dark:hover:bg-slate-700 space-x-2',
                  ])
                  :class="{ 'text-purple-500': isDarkModeSelected(), 'text-slate-500 dark:text-gray-400': !isDarkModeSelected() }"
                >
                  @svg('flex-weather-moon', 'w-5 h-5')
                  <span>Dark</span>
                </button>
                <button
                  x-menu:item
                  type="button"
                  @click="setMode();open = false;"
                  @class([
                    'flex items-center w-full px-3 py-1.5 text-sm transition-colors rounded-md hover:bg-slate-100 dark:hover:bg-slate-700 space-x-2',
                  ])
                  :class="{ 'text-purple-500': isSystemModeSelected(), 'text-slate-500 dark:text-gray-400': !isSystemModeSelected() }"
                >
                  @svg('flex-computer', 'w-5 h-5')
                  <span>System</span>
                </button>
              </div>
            </div>

            @auth
              <a href="#" class="ml-6 block text-slate-400 dark:text-slate-500 hover:text-slate-500 dark:hover:text-slate-400">
                <span class="sr-only">My account</span>
                @svg('flex-user-square', 'w-5 h-5')
              </a>
            @endauth

            @guest
              <a href="{{ route('filament.auth.login') }}" class="ml-6 block text-slate-400 dark:text-slate-500 hover:text-slate-500 dark:hover:text-slate-400">
                <span class="sr-only">Sign in to Anodyne</span>
                @svg('flex-login', 'w-5 h-5')
              </a>
            @endguest
          </div>
        </div>

                <button type="button" class="ml-auto text-slate-500 w-8 h-8 -my-1 flex items-center justify-center hover:text-slate-600 lg:hidden dark:text-slate-400 dark:hover:text-slate-300">
                    <span class="sr-only">Search</span>
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m19 19-3.5-3.5"></path><circle cx="11" cy="11" r="6"></circle></svg>
                </button>

                <div class="ml-2 -my-1 lg:hidden">
                    <button type="button" class="text-slate-500 w-8 h-8 flex items-center justify-center hover:text-slate-600 dark:text-slate-400 dark:hover:text-slate-300">
                        <span class="sr-only">Navigation</span>
                        <svg width="24" height="24" fill="none" aria-hidden="true"><path d="M12 6v.01M12 12v.01M12 18v.01M12 7a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0 6a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0 6a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    </button>

                    <div style="position: fixed; top: 1px; left: 1px; width: 1px; height: 0px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; border-width: 0px; display: none;"></div>
                </div>
            </div>
        </div>

        <div class="flex items-center p-4 border-b border-slate-900/10 lg:hidden dark:border-slate-50/[0.06]">
            <button type="button" class="text-slate-500 hover:text-slate-600 dark:text-slate-400 dark:hover:text-slate-300">
                <span class="sr-only">Navigation</span>
                <svg width="24" height="24"><path d="M5 6h14M5 12h14M5 18h14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path></svg>
            </button>

            <ol class="ml-4 flex text-sm leading-6 whitespace-nowrap min-w-0">
                <li class="flex items-center">
                    {{ $section }}
                    <svg width="3" height="6" aria-hidden="true" class="mx-3 overflow-visible text-slate-400"><path d="M0 0L3 3L0 6" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path></svg>
                </li>
                <li class="font-semibold text-slate-900 truncate dark:text-slate-200">{{ $title }}</li>
            </ol>
        </div>
    </div>
</div>