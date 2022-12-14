@props([
    'indicatorsCount' => null,
])

<x-tables::icon-button
    icon="flex-filter"
    :label="__('tables::table.buttons.filter.label')"
    :indicator="$indicatorsCount"
    {{ $attributes->class(['filament-tables-filters-trigger']) }}
/>
