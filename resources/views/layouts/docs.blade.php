<x-base-layout
  bg-color="bg-white dark:bg-slate-900"
  text-color="antialiased"
  :title="$frontmatter['pageTitle'] ?? $frontmatter['title']"
>
  <div class="lg:ml-72 xl:ml-80">
    <div class="fixed inset-y-0 left-0 z-40 contents w-72 overflow-y-auto border-r border-slate-900/10 px-6 pt-4 pb-8 dark:border-white/10 lg:block xl:w-80">
      <div class="hidden lg:flex items-center space-x-6">
        <a href="{{ route('home') }}" aria-label="Home">
          <x-logos.nova class="h-8 text-slate-700 dark:text-white" />
        </a>
      </div>

      <div
        @class([
          'fixed inset-x-0 top-0 z-50 flex h-14 items-center justify-between gap-12 px-4 transition sm:px-6 lg:z-30 lg:px-8',
          'backdrop-blur-sm dark:backdrop-blur lg:left-72 xl:left-80',
          'bg-white/[var(--bg-opacity-light)] dark:bg-slate-900/[var(--bg-opacity-dark)]'
        ])
        style="--bg-opacity-light:0.5; --bg-opacity-dark:0.2;"
        x-data
      >
        <div class="absolute inset-x-0 top-full h-px transition bg-slate-900/7.5 dark:bg-white/7.5"></div>

        <div class="hidden lg:block lg:max-w-md lg:flex-auto">
          <button
            type="button"
            class="hidden h-8 w-full items-center gap-2 rounded-full bg-white pl-2 pr-3 text-sm text-slate-500 ring-1 ring-slate-900/10 transition hover:ring-slate-900/20 dark:bg-white/5 dark:text-slate-400 dark:ring-inset dark:ring-white/10 dark:hover:ring-white/20 lg:flex focus:[&:not(:focus-visible)]:outline-none"
          >
            <svg viewBox="0 0 20 20" fill="none" aria-hidden="true" class="h-5 w-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" d="M12.01 12a4.25 4.25 0 1 0-6.02-6 4.25 4.25 0 0 0 6.02 6Zm0 0 3.24 3.25" /></svg>
            Find something...
            <kbd class="ml-auto text-2xs text-slate-400 dark:text-slate-500">
              <kbd class="font-sans" x-text="/(Mac|iPhone|iPod|iPad)/i.test(navigator.platform) ? '⌘' : 'Ctrl '"></kbd>
              <kbd class="font-sans">K</kbd>
            </kbd>
          </button>
          <SearchDialog class="hidden lg:block" {...dialogProps} />
        </div>

        {{-- <Search /> --}}
        <div class="flex items-center gap-5 lg:hidden">
          {{-- <MobileNavigation navigation={navigation} /> --}}
          <a href="/" aria-label="Home">
            <NovaLogo class="h-6 text-slate-700 dark:text-white" />
          </a>
        </div>
        <div class="flex items-center gap-5">
          <nav class="hidden md:block">
            <ul role="list" class="flex items-center gap-8">
              {{-- <VersionSwitcher currentVersion={currentVersion} /> --}}
              Version switcher
            </ul>
          </nav>

          <div class="hidden md:block md:h-5 md:w-px md:bg-slate-900/10 md:dark:bg-white/15"></div>

          <div class="flex gap-4">
            <MobileSearch />
            <ModeToggle />
          </div>

          <div class="hidden min-[416px]:contents">
            <x-button :href="route('filament.auth.login')" variant="dynamic" color="primary" size="xs">Sign in</x-button>
          </div>
        </div>
      </div>

      <nav class="hidden lg:mt-10 lg:block">
        <ul role="list">
          @foreach ($navigation as $nav)
            <li @class([
              'relative mt-6',
              'md:mt-0' => $loop->first
            ])>
              <h2 class="text-xs font-semibold text-slate-900 dark:text-white">
                {{ $nav->title }}
              </h2>

              <div class="relative mt-3 pl-2">
                <div class="absolute inset-y-0 left-2 w-px bg-slate-900/10 dark:bg-white/5"></div>

                <ul role="list" class="border-l border-transparent">
                  @foreach ($nav->links as $link)
                    @if (request()->is("docs/{$version}/{$link->href}"))
                      <div class="absolute mt-1 left-2 h-6 w-px bg-purple-500"></div>
                    @endif

                    <li class="relative">
                      <a
                        href="/docs/{{ $version }}/{{ $link->href }}"
                        @class([
                          'flex justify-between gap-2 py-1 pr-3 text-sm transition pl-4',
                          'text-slate-900 dark:text-white' => request()->is("docs/{$version}/{$link->href}"),
                          'text-slate-600 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white' => ! request()->is("docs/{$version}/{$link->href}"),
                        ])
                      >
                        <span class="truncate">{{ $link->title }}</span>
                      </a>

                      @if (request()->is("docs/{$version}/{$link->href}"))
                        <ul role="list">
                          @foreach ($sections as $section)
                            <li>
                              <a
                                href="/docs/{{ $version }}/{{ $link->href }}#{{ $section['anchor'] }}"
                                @class([
                                  'flex justify-between gap-2 py-1 pr-3 text-sm transition pl-7',
                                  'text-slate-600 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white',
                                ])
                              >
                                <span class="truncate">{{ $section['title'] }}</span>
                              </a>
                            </li>
                          @endforeach
                        </ul>
                      @endif
                    </li>
                  @endforeach
                </ul>
              </div>
            </li>
          @endforeach
        </ul>
      </nav>
    </div>

    <div class="relative px-4 pt-14 sm:px-6 lg:px-8">
      <main class="py-16">
        @isset ($frontmatter['homePage'])
          <x-grid-pattern
            width="72"
            height="56"
            x="-12"
            y="4"
            :squares="[
              [4, 3],
              [2, 1],
              [7, 3],
              [10, 6],
            ]"
          ></x-grid-pattern>
        @endisset

        <header class="mb-16 prose dark:prose-invert">
          <h1 class="scroll-mt-24">{{ $frontmatter['title'] }}</h1>
          <p class="lead">{{ $frontmatter['description'] }}</p>
        </header>

        <article class="prose prose-lg dark:prose-invert">
          {{ $slot }}
        </article>
      </main>

      <div class="flex mx-auto max-w-2xl pb-8 lg:max-w-5xl">
        <div class="flex flex-col items-start gap-3">
          @if ($previousPage)
            <x-button href="/docs/{{ $version }}/{{ $previousPage->href }}" variant="dynamic" size="xs">
              &larr;
              Previous
            </x-button>
            <a
              href="/docs/{{ $version }}/{{ $previousPage->href }}"
              tabIndex="-1"
              aria-hidden="true"
              class="text-base font-semibold text-slate-900 transition hover:text-slate-600 dark:text-white dark:hover:text-slate-300"
            >
              {{ $previousPage->title }}
            </a>
          @endif
        </div>

        <div class="ml-auto flex flex-col items-end gap-3">
          @if ($nextPage)
            <x-button href="/docs/{{ $version }}/{{ $nextPage->href }}" variant="dynamic" size="xs">
              Next
              &rarr;
            </x-button>
            <a
              href="/docs/{{ $version }}/{{ $nextPage->href }}"
              tabIndex="-1"
              aria-hidden="true"
              class="text-base font-semibold text-slate-900 transition hover:text-slate-600 dark:text-white dark:hover:text-slate-300"
            >
              {{ $nextPage->title }}
            </a>
          @endif
        </div>
      </div>

      {{-- <PageNavigation previousPage={previousPage} nextPage={nextPage} /> --}}

      <x-footer.app />
    </div>
  </div>
</x-base-layout>