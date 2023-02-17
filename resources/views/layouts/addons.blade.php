<x-base-layout
  bg-color="bg-white dark:bg-slate-900"
  text-color="antialiased"
  :title="$title"
>
  <x-header.app
    :title="$title"
    :items="[
      ['href' => route('docs'), 'title' => 'Docs' ],
      ['href' => route('addons.index'), 'title' => 'Addons' ],
      ['href' => 'https://discord.gg/7WmKUks', 'title' => 'Get Help' ],
    ]"
  ></x-header.app>

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

          {{ $sidebar }}
        </nav>
      </div>

      <div class="relative lg:pl-[19.5rem]">
        <main class="max-w-3xl mx-auto relative z-20 pt-40 md:pt-32 pb-16 xl:max-w-none">
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

          <header class="mb-16 prose dark:prose-invert">
            <h1 class="scroll-mt-24">{{ $title }}</h1>
            <p class="lead">{{ $description }}</p>
          </header>

          <article>
            {{ $slot }}
          </article>
        </main>

        <x-footer.app />
      </div>
    </div>
  </div>
</x-base-layout>