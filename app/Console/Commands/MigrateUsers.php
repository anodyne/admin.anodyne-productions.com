<?php

namespace App\Console\Commands;

use App\Models\Legacy\User as LegacyUser;
use App\Models\User;
use App\Notifications\AnodyneAccountMigrated;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MigrateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anodyne:migrate-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate users from the old database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $legacyUsers = LegacyUser::get();

        $legacyUsers->each(function (LegacyUser $legacyUser) {
            $username = str($legacyUser->username)
                ->replace([' ', '\'', '"'], '')
                ->before('@');

            $user = User::where('email', $legacyUser->email)->first();

            if ($user) {
                $user->forceFill(['legacy_id' => $legacyUser->id])->save();
            } else {
                $password = Str::random(12);

                $newUser = new User();
                $newUser->name = $username;
                $newUser->email = $legacyUser->email;
                $newUser->legacy_id = $legacyUser->id;
                $newUser->password = Hash::make($password);
                $newUser->save();

                $newUser->notify(new AnodyneAccountMigrated($newUser, $password));
            }
        });

        $this->info('Users migrated');

        return Command::SUCCESS;
    }
}
