<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTopicsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_topics')->delete();
        DB::table('project_topics')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Web Application Development',
                'description' => 'Mangement System, E-Commerce, Blog, Portfolio, etc.',
                'created_at' => '2023-05-07 17:19:17',
                'updated_at' => '2023-05-07 17:19:17',
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Mobile Application Development',
                'description' => 'Shopping, Social Media, Blog, Portfolio, etc.',
                'created_at' => '2023-05-07 17:19:17',
                'updated_at' => '2023-05-07 17:19:17',
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'Desktop Application Development',
                'description' => 'Mangement System, E-Commerce, Blog, Portfolio, etc.',
                'created_at' => '2023-05-07 17:19:17',
                'updated_at' => '2023-05-07 17:19:17',
            ),
            3 =>
            array(
                'id' => 4,
                'name' => 'Data Science',
                'description' => 'Mangement System, E-Commerce, Blog, Portfolio, etc.',
                'created_at' => '2023-05-07 17:19:17',
                'updated_at' => '2023-05-07 17:19:17',
            ),
            4 =>
            array(
                'id' => 5,
                'name' => 'Machine Learning',
                'description' => 'Mangement System, E-Commerce, Blog, Portfolio, etc.',
                'created_at' => '2023-05-07 17:19:17',
                'updated_at' => '2023-05-07 17:19:17',
            ),
            5 =>
            array(
                'id' => 6,
                'name' => 'Artificial Intelligence',
                'description' => 'Mangement System, E-Commerce, Blog, Portfolio, etc.',
                'created_at' => '2023-05-07 17:19:17',
                'updated_at' => '2023-05-07 17:19:17',
            ),
            6 =>
            array(
                'id' => 7,
                'name' => 'Internet of Things',
                'description' => 'Mangement System, E-Commerce, Blog, Portfolio, etc.',
                'created_at' => '2023-05-07 17:19:17',
                'updated_at' => '2023-05-07 17:19:17',
            ),
            7 =>
            array(
                'id' => 8,
                'name' => 'Cloud Computing',
                'description' => 'Mangement System, E-Commerce, Blog, Portfolio, etc.',
                'created_at' => '2023-05-07 17:19:17',
                'updated_at' => '2023-05-07 17:19:17',
            ),
            8 =>
            array(
                'id' => 9,
                'name' => 'Cyber Security',
                'description' => 'Mangement System, E-Commerce, Blog, Portfolio, etc.',
                'created_at' => '2023-05-07 17:19:17',
                'updated_at' => '2023-05-07 17:19:17',
            ),
        ));
    }
}
