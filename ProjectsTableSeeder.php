<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('projects')->delete();
        
        \DB::table('projects')->insert(array (
            0 => 
            array (
                'id' => 1,
                'team_id' => 3,
                'supervisor_id' => 6,
                'project_topic_id' => 7,
                'title' => 'Enim tempore cupidi',
                'description' => 'Aute illum natus ad',
                'attachment' => NULL,
                'status' => 1,
                'supervisor_comment' => 'ertuiret',
                'created_at' => '2023-07-04 15:38:00',
                'updated_at' => '2023-07-04 15:39:40',
            ),
        ));
        
        
    }
}