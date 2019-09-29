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

        for ($i = 1; $i < 10; $i++) {

            $user = new \App\User();
            $user->name = 'Andrey' . $i;
            $user->email = $i . 'zz@zz.zz';
            $user->password = md5($i . 'zz@zz.zz');
            $user->remember_token = md5(time() . 'zz@zz.zz' . $i);
            $user->id_permission = 1;
            $user->save();
        }

        for ($i = 1; $i < 5; $i++) {

            $rand = (int)rand(0, 5);

            for ($j = 1; $j < $rand; $j++) {
                $cq = new \App\ClosedQuestion();
                $cq->id_votes = $i;
                $cq->id_users = $j;
                $cq->value = (bool)(round(rand()));
                $cq->save();
            }
        }
    }
}
