<?php

use Illuminate\Database\Seeder;

// run command -> php artisan db:seed
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Todo作成
        $this->call(TodosSeeder::class);
    }
}
