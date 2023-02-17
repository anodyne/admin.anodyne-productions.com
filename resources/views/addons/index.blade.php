<x-addons-layout
    title="Nova Addons"
    description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam in et possimus mollitia, excepturi nemo consequuntur deserunt magni inventore quod recusandae id consectetur fugit quos vitae obcaecati cum quaerat explicabo."
>
    <x-slot:sidebar>
        <div>
            <h2 class="text-xs font-semibold text-slate-900 dark:text-white">
                Type
            </h2>

            <div class="relative mt-3 pl-2">
                <ul class="space-y-1">
                    <li class="relative flex items-center">
                        <x-input.checkbox label="Themes" for="type_theme" wire:model="filters.type" value="theme" />
                    </li>
                    <li class="relative flex items-center">
                        <x-input.checkbox label="Extensions" for="type_extension" wire:model="filters.type" value="extension" />
                    </li>
                    <li class="relative flex items-center">
                        <x-input.checkbox label="Rank Images" for="type_rank" wire:model="filters.type" value="rank" />
                    </li>
                    <li class="relative flex items-center">
                        <x-input.checkbox label="Genres" for="type_genre" wire:model="filters.type" value="genre" />
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-12">
            <h2 class="text-xs font-semibold text-slate-900 dark:text-white">
                Nova Version
            </h2>

            <div class="relative mt-3 pl-2 space-y-3">
                <div class="flex flex-col space-y-0.5">
                    <label class="font-medium">Minimum</label>
                    <x-input.select wire:model="filters.min-version" class="text-sm">
                        <option value="">All versions</option>
                        <option value="2.6.1">v2.6.1</option>
                        <option value="3.0.0">v3.0</option>
                        <option value="3.0.1">v3.0.1</option>
                        <option value="3.0.2">v3.0.2</option>
                        <option value="3.0.3">v3.0.3</option>
                    </x-input.select>
                </div>

                <div class="flex flex-col space-y-0.5">
                    <label class="font-medium">Maximum</label>
                    <x-input.select wire:model="filters.max-version" class="text-sm">
                        <option value="">All versions</option>
                        <option value="2.6.1">v2.6.1</option>
                        <option value="3.0.0">v3.0</option>
                        <option value="3.0.1">v3.0.1</option>
                        <option value="3.0.2">v3.0.2</option>
                        <option value="3.0.3">v3.0.3</option>
                    </x-input.select>
                </div>
            </div>
        </div>

        <div class="mt-12">
            <h2 class="text-xs font-semibold text-slate-900 dark:text-white">
                Average Rating
            </h2>

            <div class="relative mt-3 pl-2">
                <ul class="space-y-1.5">
                    <li class="relative">
                        <button class="flex items-center focus:outline-none focus:ring-0 rounded py-1" wire:click="$set('filters.rating', 4)">
                            @svg('fs-star', 'h-5 w-5 text-amber-400')
                            @svg('fs-star', 'h-5 w-5 text-amber-400')
                            @svg('fs-star', 'h-5 w-5 text-amber-400')
                            @svg('fs-star', 'h-5 w-5 text-amber-400')
                            @svg('fs-star', 'h-5 w-5 text-gray-400')
                            <span class="ml-1 text-gray-500 font-medium">&amp; up</span>
                        </button>
                    </li>
                    <li class="relative">
                        <button class="flex items-center focus:outline-none focus:ring-0 rounded py-1" wire:click="$set('filters.rating', 3)">
                            @svg('fs-star', 'h-5 w-5 text-amber-400')
                            @svg('fs-star', 'h-5 w-5 text-amber-400')
                            @svg('fs-star', 'h-5 w-5 text-amber-400')
                            @svg('fs-star', 'h-5 w-5 text-gray-400')
                            @svg('fs-star', 'h-5 w-5 text-gray-400')
                            <span class="ml-1 text-gray-500 font-medium">&amp; up</span>
                        </button>
                    </li>
                    <li class="relative">
                        <button class="flex items-center focus:outline-none focus:ring-0 rounded py-1" wire:click="$set('filters.rating', 2)">
                            @svg('fs-star', 'h-5 w-5 text-amber-400')
                            @svg('fs-star', 'h-5 w-5 text-amber-400')
                            @svg('fs-star', 'h-5 w-5 text-gray-400')
                            @svg('fs-star', 'h-5 w-5 text-gray-400')
                            @svg('fs-star', 'h-5 w-5 text-gray-400')
                            <span class="ml-1 text-gray-500 font-medium">&amp; up</span>
                        </button>
                    </li>
                    <li class="relative">
                        <button class="flex items-center focus:outline-none focus:ring-0 rounded py-1" wire:click="$set('filters.rating', 1)">
                            @svg('fs-star', 'h-5 w-5 text-amber-400')
                            @svg('fs-star', 'h-5 w-5 text-gray-400')
                            @svg('fs-star', 'h-5 w-5 text-gray-400')
                            @svg('fs-star', 'h-5 w-5 text-gray-400')
                            @svg('fs-star', 'h-5 w-5 text-gray-400')
                            <span class="ml-1 text-gray-500 font-medium">&amp; up</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-12">
            <x-button class="w-full" variant="secondary" size="sm">Reset filters</x-button>
        </div>
    </x-slot:sidebar>

    @foreach ($addons as $addon)
        <h2>{{ $addon->name }}</h2>
    @endforeach
</x-addons-layout>