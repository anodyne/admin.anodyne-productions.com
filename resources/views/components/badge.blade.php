@props([
    'color' => 'gray',
    'size' => 'md',
    'leading' => false,
    'trailing' => false,
    'group' => false,
    'border' => false,
])

<span @class([
    'inline-flex items-center rounded-full font-medium',
    'space-x-1.5' => !$group,
    'space-x-3' => $group,
    'px-2 py-0.5 text-xs' => $size === 'sm' && !$group,
    'px-2.5 py-0.5 text-sm' => $size === 'md' && !$group,
    'px-3 py-1 text-sm' => $size === 'lg' && !$group,
    'px-3.5 py-1 text-sm' => $group,

    'bg-gray-100 text-gray-700' => $color === 'gray' && !$border,

    'bg-white text-purple-700' => $color === 'purple-light' && $border === false,
    'bg-purple-100 text-purple-700' => $color === 'purple' && $border === false,
    'bg-purple-600 text-white' => $color === 'purple-dark' && $border === false,

    'bg-transparent border-[1.5px] border-purple-700 text-purple-700' => $color === 'purple-light' && $border === true,
    'bg-purple-50 border-[1.5px] border-purple-700 text-purple-700' => ($color === 'purple' || $color === 'purple-dark') && $border === true,
])>
    @if ($leading)
        <div class="shrink-0">
            <div @class([
                '-ml-2.5' => $group,
            ])>
                {{ $leading }}
            </div>
        </div>
    @endif

    <span>{{ $slot }}</span>

    @if ($trailing)
        <div class="shrink-0">
            <div @class([
                '-mr-2.5' => $group,
            ])>
                {{ $trailing }}
            </div>
        </div>
    @endif
</span>