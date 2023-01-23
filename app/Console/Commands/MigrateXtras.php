<?php

namespace App\Console\Commands;

use App\Models\Addon;
use App\Models\Legacy\Xtra;
use App\Models\User;
use Illuminate\Console\Command;

class MigrateXtras extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anodyne:migrate-xtras';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate Xtras from the old database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $xtras = Xtra::get();

        $xtras->each(function (Xtra $xtra) {
            $addon = Addon::where('legacy_id', $xtra->id)->first();

            $user = User::where('legacy_id', $xtra->user_id)->first();

            if ($addon) {
                $addon->forceFill([
                    'name' => $xtra->name,
                    'description' => $xtra->desc,
                    'user_id' => $user->id,
                    'type' => $this->getType($xtra->type_id),
                    'published' => $xtra->status == 1,
                    'legacy_id' => $xtra->id,
                    'deleted_at' => $xtra->deleted_at,
                ])->save();

                $addon->products()->sync($xtra->product_id);
            } else {
                $newAddon = new Addon();

                $newAddon->name = $xtra->name;
                $newAddon->description = $xtra->desc;
                $newAddon->user_id = $user->id;
                $newAddon->type = $this->getType($xtra->type_id);
                $newAddon->published = true;
                $newAddon->legacy_id = $xtra->id;
                $newAddon->deleted_at = $xtra->deleted_at;

                $newAddon->save();

                $newAddon->products()->sync($xtra->product_id);
            }
        });

        $this->info('Xtras migrated');

        return Command::SUCCESS;
    }

    protected function getType(int $typeId)
    {
        return [
            1 => 'theme',
            2 => 'rank',
            3 => 'extension',
        ][$typeId];
    }
}
