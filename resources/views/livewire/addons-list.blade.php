<x-addons-list-layout
  title="Make Nova your own"
  description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam in et possimus mollitia, excepturi nemo consequuntur deserunt magni inventore quod recusandae id consectetur fugit quos vitae obcaecati cum quaerat explicabo."
  eyebrow="Add-ons"
>
  <x-slot:sidebar>
    <div class="space-y-8">
      <div>
        <x-input.text placeholder="Search for add-ons..." wire:model.debounce.500ms="search">
          @if (filled($filters['search']))
            <x-slot:trailingAddOn>
              <button wire:click="$set('filters.search', '')">
                @svg('flex-delete-circle', 'h-4 w-4')
              </button>
            </x-slot:trailingAddOn>
          @endif
        </x-input.text>
      </div>

      <div>
        <h2 class="text-xs font-semibold text-slate-900 dark:text-white">
          Version
        </h2>

        <div class="relative mt-3 pl-2">
          <ul class="space-y-1">
            @foreach ($this->products as $id => $name)
              <li class="relative flex items-center">
                <x-input.checkbox :label="$name" id="product_{{ $id }}" wire:model="filters.products" :value="$id" />
              </li>
            @endforeach
          </ul>
        </div>
      </div>

      <div>
        <h2 class="text-xs font-semibold text-slate-900 dark:text-white">
          Type
        </h2>

        <div class="relative mt-3 pl-2">
          <ul class="space-y-1">
            @foreach (App\Enums\AddonType::cases() as $type)
              <li class="relative flex items-center">
                <x-input.checkbox :label="$type->displayName()" id="type_{{ $type->value }}" wire:model="filters.types" :value="$type->value" />
              </li>
            @endforeach
          </ul>
        </div>
      </div>

      <div>
        <x-button class="w-full" variant="secondary" size="sm" wire:click="resetFilters">Reset filters</x-button>
      </div>
    </div>
  </x-slot:sidebar>

  <div @class([
    'grid',
    'grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-x-6 gap-y-12' => $this->addons->count() > 0,
    'grid-cols-1' => $this->addons->count() === 0,
  ])>
    @forelse ($this->addons as $addon)
      <a href="{{ route('addons.show', $addon) }}" class="flex flex-col bg-white dark:bg-slate-800 overflow-hidden shadow hover:shadow-lg dark:shadow-lg rounded-xl ring-1 ring-slate-900/5 transition">
        <div class="relative">
          @if ($addon->getMedia('primary-preview')->count() === 1)
            <img src="{{ $addon->getFirstMediaUrl('primary-preview') }}" alt="" class="w-full h-56 bg-cover">
          @else
            <div class="bg-slate-300 dark:bg-slate-700 flex items-center justify-center px-6 py-16">
              <x-logos.nova.mark class="text-slate-400 dark:text-slate-600 h-24 w-auto" :colors="false"></x-logos.nova.mark>
            </div>
          @endif
        </div>

        <div class="flex-1 w-full px-4 py-5 sm:p-6">
          <h2 class="font-extrabold text-slate-900 dark:text-white tracking-tight text-lg">
            {{ ucfirst($addon->name) }}
          </h2>
          <div class="mt-4 flex items-center justify-between">
            <div class="flex items-center space-x-3">
              <div class="squircle overflow-hidden ring ring-white bg-white">
                <img src="{{ $addon->user->getFirstMediaUrl('avatar') }}" alt="" class="h-10 w-10">
              </div>
              <span class="text-slate-700 dark:text-slate-300 font-medium">{{ $addon->user->name }}</span>
            </div>
          </div>
        </div>
        <div class="px-4 py-4 sm:px-6 bg-slate-50 dark:bg-slate-900/50 border-t border-slate-900/5 space-x-2.5 flex items-center">
          <x-badge size="xs" :color="$addon->type->badgeColor()" fill="neutral">
            <x-slot:leading>
              @svg($addon->type->icon(), 'h-4 w-4')
            </x-slot:leading>
            {{ $addon->type->displayName() }}
          </x-badge>

          @foreach ($addon->products as $product)
            <div>
              <x-badge size="xs" fill="neutral">{{ $product->name }}</x-badge>
            </div>
          @endforeach
        </div>
      </a>
    @empty
      <div class="flex gap-2.5 rounded-2xl p-4 leading-6 border border-amber-500/20 bg-amber-50/50 text-amber-800 dark:border-amber-500/30 dark:bg-amber-500/5 dark:text-amber-200 max-w-3xl">
        @svg('flex-alert-diamond', 'h-6 w-6 flex-none')
        <div class="w-full">
          <h2 class="m-0 font-medium text-lg leading-6">No add-ons found</h2>
          <p class="prose dark:prose-invert mt-2.5 text-amber-700 dark:text-amber-300 prose-strong:text-amber-800 dark:prose-strong:text-amber-100">We couldn't find any add-ons that matched your search criteria. Please try a different search.</p>
        </div>
      </div>
    @endforelse
  </div>

  {{ $this->addons->links() }}
</x-addons-list-layout>