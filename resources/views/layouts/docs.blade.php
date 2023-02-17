<x-base-layout
  bg-color="bg-white dark:bg-slate-900"
  text-color="antialiased"
  :title="$frontmatter['pageTitle'] ?? $frontmatter['title']"
>
  <x-header.app
    :title="$frontmatter['title']"
    :section="$frontmatter['section']"
    :items="[
      ['href' => route('docs'), 'title' => 'Docs' ],
      ['href' => route('addons.index'), 'title' => 'Addons' ],
      ['href' => 'https://discord.gg/7WmKUks', 'title' => 'Get Help' ],
    ]"
  >
    <x-slot:trailingLogo>
      <div class="relative" x-data x-menu>
        <x-button x-menu:button variant="secondary" size="xs" aria-haspopup="true" aria-expanded="false">
          <span>v{{ request()->route('version') }}</span>
          <svg width="6" height="3" class="overflow-visible" aria-hidden="true"><path d="M0 0L3 3L6 0" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path></svg>
        </x-button>

        <div
          x-menu:items
          x-transition.origin.top.left
          class="absolute left-0 w-40 mt-2 z-10 origin-top-left bg-white dark:bg-slate-800 shadow-md ring-1 ring-slate-900/10 dark:ring-0 dark:highlight-white/5 rounded-lg outline-none p-1"
          x-cloak
        >
          @foreach (config('anodyne.docs-versions') as $docVersion)
            <a
              x-menu:item
              href="/docs/{{ $docVersion }}"
              @class([
                'flex items-center justify-between w-full px-3 py-1 text-sm transition-colors rounded-md hover:bg-slate-100 dark:hover:bg-slate-700',
                'font-semibold text-purple-500' => request()->route('version') === $docVersion,
                'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100' => request()->route('version') !== $docVersion,
              ])
            >
                v{{ $docVersion }}

                @if (request()->route('version') === $docVersion)
                  <svg width="24" height="24" fill="none" aria-hidden="true"><path d="m7.75 12.75 2.25 2.5 6.25-6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                @endif
            </a>
          @endforeach
        </div>
      </div>
    </x-slot:trailingLogo>
  </x-header.app>

  <div class="overflow-hidden">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
      <div class="hidden lg:block fixed z-20 inset-0 top-[3.8125rem] left-[max(0px,calc(50%-45rem))] right-auto w-[19.5rem] pb-10 px-8 overflow-y-auto">
        <nav id="nav" class="lg:text-sm lg:leading-6 relative">
          <div class="sticky top-0 -ml-0.5 pointer-events-none z-10">
            <div class="h-10 bg-white dark:bg-slate-900"></div>
            <div class="bg-white dark:bg-slate-900 relative pointer-events-auto z-50">
              <button type="button" class="hidden w-full lg:flex items-center text-sm leading-6 text-slate-400 rounded-md ring-1 ring-slate-900/10 shadow-sm py-1.5 pl-2 pr-3 hover:ring-slate-300 dark:bg-slate-800 dark:highlight-white/5 dark:hover:bg-slate-700"><svg width="24" height="24" fill="none" aria-hidden="true" class="mr-3 flex-none"><path d="m19 19-3.5-3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><circle cx="11" cy="11" r="6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></circle></svg>Quick search...<span class="ml-auto pl-3 flex-none text-xs font-semibold">⌘K</span></button>
            </div>
            <div class="h-8 bg-gradient-to-b from-white dark:from-slate-900"></div>
          </div>

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

      <div class="relative lg:pl-[19.5rem]">
        <main class="max-w-3xl mx-auto relative z-20 pt-40 md:pt-24 pb-16 xl:max-w-none">
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
            <p class="mb-2 text-sm leading-6 font-semibold text-purple-500 dark:text-purple-400">{{ $frontmatter['section'] }}</p>

            @isset($frontmatter['tag'])
              <div class="flex items-center gap-x-3">
                <span @class([
                  'font-mono text-[0.625rem] font-semibold leading-6',
                  'rounded-lg px-1.5 ring-1 ring-inset',
                  'ring-amber-300 bg-amber-400/10 text-amber-500 dark:ring-amber-400/30 dark:bg-amber-400/10 dark:text-amber-400' => $frontmatter['tag'] === 'EXPERIMENTAL'
                ])>
                  {{ $frontmatter['tag'] }}
                </span>
              </div>
            @endisset

            <h1 @class([
              'mt-2 scroll-mt-32' => isset($frontmatter['tag']),
              'scroll-mt-24' => ! isset($frontmatter['tag'])
            ])>
              {{ $frontmatter['title'] }}
            </h1>
            <p class="lead">{{ $frontmatter['description'] }}</p>
          </header>

          <article class="prose prose-lg dark:prose-invert">
            {{ $slot }}
          </article>
        </main>

        <div class="flex mx-auto max-w-2xl pb-8 lg:max-w-5xl">
          <div class="flex flex-col items-start gap-3">
            @if ($previousPage)
              <x-button href="/docs/{{ $version }}/{{ $previousPage->href }}" variant="secondary" size="xs">
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
              <x-button href="/docs/{{ $version }}/{{ $nextPage->href }}" variant="secondary" size="xs">
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

        <x-footer.app />
      </div>
    </div>
  </div>
</x-base-layout>