<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(VotesTableSeeder::class);

        $user = new \App\User();

        $user->name = 'Andrey';
        $user->email = 'zz@zz.zz';
        $user->password = md5('zz@zz.zz');
        $user->remember_token = md5(time() . 'zz@zz.zz');
        $user->id_permission = 1;
        $user->save();
    }
}
