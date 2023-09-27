<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('teams')->delete();
        DB::table('teams')->insert(array(
            0 =>
            array(
                'id' => 2,
                'name' => 'Team Asuma',
                'member_1' => 3,
                'member_2' => 4,
                'status' => 1,
                'created_at' => '2023-06-24 15:50:30',
                'updated_at' => '2023-06-24 15:50:58',
            ),
            1 =>
            array(
                'id' => 3,
                'name' => 'Team Kakashi',
                'member_1' => 2,
                'member_2' => 5,
                'status' => 1,
                'created_at' => '2023-06-24 15:53:17',
                'updated_at' => '2023-06-24 15:53:26',
            ),
        ));
    }
}
