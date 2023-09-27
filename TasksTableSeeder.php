<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tasks')->delete();
        
        \DB::table('tasks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'project_id' => 1,
                'team_id' => 3,
                'supervisor_id' => 6,
                'title' => 'reterterer',
                'description' => 'tertreter5t435345ergdf',
                'attachment' => NULL,
                'submitted_attachment' => NULL,
                'status' => 1,
                'started_at' => '2023-07-24 12:00:00',
                'ended_at' => '2023-07-25 12:00:00',
                'submitted_at' => NULL,
                'created_at' => '2023-07-24 16:11:06',
                'updated_at' => '2023-07-24 16:13:24',
            ),
        ));
        
        
    }
}