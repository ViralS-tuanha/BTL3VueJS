<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        App\User::create([
            'account' => 'admin',
            'password' => bcrypt('1'),
            'email' => 'admin@gmail.com',
            'name' => 'Hoang tuan',
            'role' => 'admin',
        ]);
        factory(App\User::class, 20)->create();

    }
}
