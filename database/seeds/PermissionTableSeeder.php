<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'title' => 'Физ. лицо'
        ]);

        DB::table('permissions')->insert([
            'title' => 'Юр. лицо'
        ]);
    }
}
