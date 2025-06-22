<?php

namespace Database\Seeders;

use App\Enums\Seeder\SeederDefaults;
use App\Enums\Seeder\User\DefaultUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::find(DefaultUser::DEFAULT_USER_ID);

        if ($user !== null) {
            $this->command->warn('user already exists, skipping.');

            return;
        }

        User::factory()
            ->forDefaultUser(
                DefaultUser::DEFAULT_USER_ID,
                DefaultUser::DEFAULT_NAME,
                DefaultUser::DEFAULT_EMAIL,
                DefaultUser::DEFAULT_PASSWORD,
            )
            ->create();

        User::factory()
            ->count(SeederDefaults::DEFAULT_SEED_COUNT)
            ->create();
    }
}
