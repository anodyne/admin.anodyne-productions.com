<?php

declare(strict_types=1);

namespace Domain\Exchange\Providers;

use Domain\DomainServiceProvider;
use Domain\Exchange\Livewire\ShowAddons;
use Domain\Exchange\Models\Addon;
use Domain\Exchange\Models\Question;
use Domain\Exchange\Models\Version;
use Domain\Exchange\Policies\AddonPolicy;
use Domain\Users\Role;
use Illuminate\Support\Facades\Gate;

class ExchangeServiceProvider extends DomainServiceProvider
{
    protected $livewireComponents = [
        'exchange:show-addons' => ShowAddons::class,
    ];

    protected $morphMaps = [
        'addon' => Addon::class,
        'question' => Question::class,
        'version' => Version::class,
    ];

    protected $policies = [
        Addon::class => AddonPolicy::class,
    ];

    public function boot()
    {
        parent::boot();

        Gate::before(function ($user) {
            if ($user->role === Role::ADMIN) {
                return true;
            }
        });
    }
}
