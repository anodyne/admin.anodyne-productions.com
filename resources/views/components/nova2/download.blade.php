@props([
    'version',
])

<a name="download"></a>
<section
  id="download"
  class="relative isolate overflow-hidden bg-slate-900"
  x-data="{
    selectedGenre: null,
    selectedVersion: null,
    genres: [
      { id: 1, value: 'bl5', name: 'Babylon 5' },
      { id: 2, value: 'blank', name: 'Blank' },
      { id: 3, value: 'bsg', name: 'Battlestar Galactica' },
      { id: 4, value: 'dnd', name: 'Dungeons and Dragons' },
      { id: 5, value: 'dsv', name: 'seaQuest DSV' },
      { id: 6, value: 'sga', name: 'Stargate Atlantis' },
      { id: 7, value: 'sg1', name: 'Stargate SG-1' },
      { id: 8, value: 'baj', name: 'Bajorans (Star Trek)' },
      { id: 9, value: 'crd', name: 'Cardassians (Star Trek)' },
      { id: 10, value: 'ds9', name: 'Deep Space Nine (Star Trek)' },
      { id: 11, value: 'ent', name: 'Enterprise era (Star Trek)' },
      { id: 12, value: 'kli', name: 'Klingons (Star Trek)' },
      { id: 13, value: 'mov', name: 'Movie era (Star Trek)' },
      { id: 14, value: 'rom', name: 'Romulans (Star Trek)' },
      { id: 15, value: 'tos', name: 'The Original Series (Star Trek)' },
      { id: 16, value: 'sto', name: 'Star Trek Online' },
    ],
    versions: [
      {
        id: 1,
        name: '{{ $version }}',
        value: '{{ $version }}',
      },
      {
        id: 2,
        name: '2.6.2 (Legacy - PHP 5.6)',
        value: '2.6.2',
      },
      {
        id: 3,
        name: '2.3.2 (Legacy - PHP 5.3)',
        value: '2.3.2',
      },
    ],
  }"
  x-init="() => selectedVersion = versions[0]"
>
  <div class="py-24 px-6 sm:px-6 sm:py-32 lg:px-8">
    <div class="mx-auto max-w-2xl text-center">
      <h2 class="text-3xl tracking-tight text-white/50 sm:text-4xl">
        Ready to get started?
      </h2>

      <h2 class="mt-1.5 font-bold text-3xl tracking-tight text-white sm:text-4xl">
        Download Nova today.
      </h2>

      <div class="relative grid grid-cols-1 sm:grid-cols-2 gap-8 text-left mt-6">
        <div
          x-listbox
          x-model="selectedVersion"
          class="relative"
        >
          <label x-listbox:label class="font-medium text-white/75 text-sm">Version</label>

          <button
            x-listbox:button
            class="relative w-full cursor-default rounded-lg bg-white mt-1 py-2 pl-3 pr-10 text-left shadow-md focus:outline-none focus-visible:border-purple-500 focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-orange-300 sm:text-sm"
          >
            <span x-text="selectedVersion ? selectedVersion.name : 'Select a version'" class="block truncate"></span>

            <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="shrink-0 w-5 h-5 text-slate-400"><path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" /></svg>
            </span>
          </button>

          <ul
            x-listbox:options
            x-transition.origin.top.left
            x-cloak
            class="absolute max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
          >
            <template x-for="version in versions" :key="version.id">
              <li
                x-listbox:option
                :value="version"
                :class="{
                  'bg-purple-500/10 text-slate-900': $listboxOption.isActive,
                  'text-slate-600': ! $listboxOption.isActive,
                  'opacity-50 cursor-not-allowed': $listboxOption.isDisabled,
                }"
                class="flex items-center cursor-default justify-between gap-2 w-full px-4 py-2 text-sm transition-colors"
              >
                <span x-text="version.name"></span>

                <span x-show="$listboxOption.isSelected" class="text-purple-600 font-bold">&check;</span>
              </li>
            </template>
          </ul>
        </div>

        <div
          x-listbox
          x-model="selectedGenre"
          class="relative"
          x-data
        >
          <label x-listbox:label class="font-medium text-white/75 text-sm">Genre</label>

          <button
            x-listbox:button
            @click="$float()"
            class="relative w-full cursor-default rounded-lg bg-white mt-1 py-2 pl-3 pr-10 text-left shadow-md focus:outline-none focus-visible:border-purple-500 focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-orange-300 sm:text-sm"
          >
            <span x-text="selectedGenre ? selectedGenre.name : 'Select a genre'" class="block truncate"></span>

            <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="shrink-0 w-5 h-5 text-slate-400"><path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" /></svg>
            </span>
          </button>

          <ul
            x-listbox:options
            x-transition.origin.top.left
            x-float.placement.bottom-start
            x-ref="panel"
            x-cloak
            class="max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black/5 focus:outline-none sm:text-sm"
          >
            <template x-for="genre in genres" :key="genre.id">
              <li
                x-listbox:option
                :value="genre"
                :disabled="genre.disabled"
                :class="{
                  'bg-purple-500/10 text-slate-900': $listboxOption.isActive,
                  'text-slate-600': ! $listboxOption.isActive,
                  'opacity-50 cursor-not-allowed': $listboxOption.isDisabled,
                }"
                class="flex items-center cursor-default justify-between gap-2 w-full px-4 py-2 text-sm transition-colors"
              >
                <span x-text="genre.name"></span>

                <span x-show="$listboxOption.isSelected" class="text-purple-600 font-bold">&check;</span>
              </li>
            </template>
          </ul>
        </div>
      </div>

      <div class="mt-8 flex space-x-3 text-white font-medium text-sm leading-6 text-left" x-show="selectedVersion?.value.includes('2.6')">
        @svg('flex-alert-diamond', 'h-8 w-8 text-danger-500 shrink-0')
        <span>Nova 2.6.2 is legacy software and intended only for games hosted on a server running PHP 5.3 - 5.6. This version of Nova is no longer receiving updates.</span>
      </div>

      <div class="mt-8 flex space-x-3 text-white font-medium text-sm leading-6 text-left" x-show="selectedVersion?.value.includes('2.3')">
        @svg('flex-alert-diamond', 'h-8 w-8 text-danger-500 shrink-0')
        <span>Nova 2.3.2 is legacy software and intended only for games hosted on a server running PHP 5.2. This version of Nova is no longer receiving updates.</span>
      </div>

      <div x-show="selectedVersion && selectedGenre">
        <x-button href="#" variant="dark" color="brand" class="mt-10 flex items-center space-x-2.5">
          <div>Download</div>
          @svg('flex-cloud-download', 'h-5 w-5 shrink-0')
        </x-button>
      </div>
    </div>
  </div>

  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" class="absolute top-1/2 left-1/2 -z-10 h-[64rem] w-[64rem] -translate-x-1/2" aria-hidden="true">
    <circle cx="512" cy="512" r="512" fill="url(#8d958450-c69f-4251-94bc-4e091a323369)" fill-opacity="0.7" />
    <defs>
      <radialGradient id="8d958450-c69f-4251-94bc-4e091a323369" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(512 512) rotate(90) scale(512)">
        <stop stop-color="#7775D6" />
        <stop offset="1" stop-color="#7dd3fc" stop-opacity="0" />
      </radialGradient>
    </defs>
  </svg>
</section>