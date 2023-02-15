<x-base-layout>
  <x-nova2.header />

  <x-nova2.features />

  <x-nova2.download :version="$latestVersion" />

  <x-nova2.resources />

  <x-nova2.sponsors :sponsors="$sponsors" />

  <x-footer.landing
    :items="[
      ['name' => 'Features', 'href' => '#features' ],
      ['name' => 'Download', 'href' => '#download' ],
      ['name' => 'Docs', 'href' => '/docs' ],
      ['name' => 'Resources', 'href' => '#resources' ],
      ['name' => 'Get Help', 'href' => 'https://discord.gg/7WmKUks' ],
      ['name' => 'Nova 3', 'href' => '/nova-3' ],
    ]"
  />
</x-base-layout>