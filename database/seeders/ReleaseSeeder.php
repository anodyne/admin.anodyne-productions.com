<?php

namespace Database\Seeders;

use App\Models\Release;
use Illuminate\Database\Seeder;

class ReleaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Release::factory()->create(['version' => '2.7.0']);
        Release::factory()->create(['version' => '2.7.1']);
        Release::factory()->create(['version' => '2.7.2']);
        Release::factory()->create(['version' => '2.7.3']);
    }
}
