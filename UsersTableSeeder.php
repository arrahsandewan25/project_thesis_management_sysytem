<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert(array(
            0 =>
            array(
                'id' => 1,
                'user_type' => 'Admin',
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'roll_no' => NULL,
                'registration_no' => NULL,
                'department' => NULL,
                'session' => NULL,
                'designation' => NULL,
                'is_member' => '0',
                'project_topic_id' => NULL,
                'email' => 'admin@gmail.com',
                'phone' => '01700000000',
                'address' => 'Dhaka, Bangladesh',
                'password' => '$2y$10$ZOu6rcpAyd1NLH62n6SdN.RHjrVG0fLS4ymta1tJhFl5X1OODose.',
                'dob' => '1998-03-14',
                'image' => NULL,
                'created_at' => '2023-04-30 18:49:05',
                'updated_at' => '2023-05-03 18:04:49',
            ),
        ));
    }
}
