<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(\App\User::class)->create([
            'name' => 'Anna Sarzhan',
            'role' => 'admin',
            'email' => 'admin@admin.com',
        ]);

        factory(\App\User::class, 20)->create();
    }
}
