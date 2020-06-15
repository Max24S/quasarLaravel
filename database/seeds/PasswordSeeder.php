<?php

use Illuminate\Database\Seeder;

class PasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Password::class, 100)->create([
        ]);
    }
}
