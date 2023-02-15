<x-base-layout bg-color="bg-gray-900" text-color="text-gray-400">
  <x-nova3.header />

  <x-nova3.demo />

  <x-nova3.faq />

  <x-footer.landing
    :items="[
      ['name' => 'Features', 'href' => '#features' ],
      ['name' => 'Demo', 'href' => '#demo' ],
      ['name' => 'Docs', 'href' => '/docs/3.0/introduction' ],
      ['name' => 'FAQs', 'href' => '#faq' ],
      ['name' => 'Discuss', 'href' => 'https://discord.gg/7WmKUks' ],
      ['name' => 'Nova 2', 'href' => '/' ],
    ]"
    :dark="true"
  />
</x-base-layout>