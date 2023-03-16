<?php

namespace Database\Seeders;

use App\Models\Addon;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class AddonSeeder extends Seeder
{
    public function run()
    {
        User::get()->each(function (User $user) {
            Addon::factory()
                ->count(5)
                ->for($user)
                ->hasQuestions(5)
                ->hasVersions(5)
                ->hasAttached(
                    Product::published()->get()->random()
                )
                ->create();
        });
    }
}
