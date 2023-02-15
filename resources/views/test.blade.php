<x-base-layout>
    <div class="p-16 bg-white">
        {!! $markdown !!}
    </div>

    <div class="p-16 bg-white space-y-4">
        <div class="flex items-center space-x-4">
            <x-badge color="purple" size="sm">Badge</x-badge>
            <x-badge color="purple">Badge</x-badge>
            <x-badge color="purple" size="lg">Badge</x-badge>
        </div>

        <div class="flex items-center space-x-4">
            <x-badge color="purple" size="sm" border>Badge</x-badge>
            <x-badge color="purple" border>Badge</x-badge>
            <x-badge color="purple" size="lg" border>Badge</x-badge>
        </div>

        <div class="flex items-center space-x-4">
            <x-badge color="purple" size="sm">
                <x-slot:trailing>
                    <div class="h-2 w-2 rounded-full bg-purple-500"></div>
                </x-slot:trailing>
                Badge
            </x-badge>
            <x-badge color="purple">
                <x-slot:leading>
                    <div class="h-2 w-2 rounded-full bg-purple-500"></div>
                </x-slot:leading>
                Badge
            </x-badge>
            <x-badge color="purple" size="lg">
                <x-slot:leading>
                    <div class="h-2 w-2 rounded-full bg-purple-500"></div>
                </x-slot:leading>
                Badge
            </x-badge>
        </div>

        <div class="flex items-center space-x-4">
            <x-badge color="purple" size="sm" border>
                <x-slot:trailing>
                    <div class="h-2 w-2 rounded-full bg-purple-500"></div>
                </x-slot:trailing>
                Badge
            </x-badge>
            <x-badge color="purple" border>
                <x-slot:leading>
                    <div class="h-2 w-2 rounded-full bg-purple-500"></div>
                </x-slot:leading>
                Badge
            </x-badge>
            <x-badge color="purple" size="lg" border>
                <x-slot:leading>
                    <div class="h-2 w-2 rounded-full bg-purple-500"></div>
                </x-slot:leading>
                Badge
            </x-badge>
        </div>

        <div class="flex items-center space-x-4">
            <x-badge color="purple" size="sm">
                <x-slot:trailing>
                    @svg('flex-check-square', 'h-3 w-3 text-purple-500')
                </x-slot:trailing>
                Badge
            </x-badge>
            <x-badge color="purple">
                <x-slot:leading>
                    @svg('flex-check-square', 'h-3 w-3 text-purple-500')
                </x-slot:leading>
                Badge
            </x-badge>
            <x-badge color="purple" size="lg">
                <x-slot:trailing>
                    @svg('flex-check-square', 'h-4 w-4 text-purple-500')
                </x-slot:trailing>
                Badge
            </x-badge>
        </div>

        <div class="flex items-center space-x-4">
            <x-badge color="purple" group border>
                <x-slot:leading>
                    <x-badge color="purple-light" border>Version 3.0</x-badge>
                </x-slot:leading>
                We've released a new version!
            </x-badge>
        </div>

        <div class="flex items-center space-x-4">
            <x-badge color="purple-dark" group>
                <x-slot:trailing>
                    <x-badge color="purple">Version 3.0</x-badge>
                </x-slot:trailing>
                We've released a new version!
            </x-badge>
        </div>

        <div class="flex items-center space-x-4">
            <x-badge color="purple" group>
                <x-slot:trailing>
                    <x-badge color="purple-light">Version 3.0</x-badge>
                </x-slot:trailing>
                We've released a new version!
            </x-badge>
        </div>
    </div>
</x-base-layout>