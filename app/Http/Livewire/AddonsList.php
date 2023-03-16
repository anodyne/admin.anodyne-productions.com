<?php

namespace App\Http\Livewire;

use App\Models\Addon;
use App\Models\Product;
use App\View\Components\BaseLayout;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class AddonsList extends Component
{
    use WithPagination;

    public array $filters = [
        'products' => ['1', '2'],
        'types' => ['extension', 'rank', 'theme'],
        'search' => '',
    ];

    public function resetFilters(): void
    {
        $this->reset('filters');
    }

    public function getAddonsProperty()
    {
        return Addon::query()
            ->published()
            ->when(
                $this->filters['types'],
                fn (Builder $query, array $values): Builder => $query->whereIn('type', $values)
            )
            ->when(
                $this->filters['products'],
                fn (Builder $query, array $products): Builder => $query->whereHas(
                    'products',
                    fn (Builder $q) => $q->whereIn('products.id', $products)
                )
            )
            ->when(
                $this->filters['search'],
                fn (Builder $query, string $search) => $query->where('name', 'like', "%{$search}%")
            )
            ->paginate(15);
    }

    public function getProductsProperty(): Collection
    {
        return Product::query()
            ->published()
            ->get()
            ->pluck('name', 'id');
    }

    public function render()
    {
        return view('livewire.addons-list')
            ->layout(BaseLayout::class, [
                'attributes' => [
                    'class' => 'bg-white dark:bg-slate-900',
                ],
                'title' => 'Nova Add-ons by Anodyne',
                'hasAppearanceModes' => true,
            ]);
    }
}
