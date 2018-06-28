<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('projects')->insert([
            [
                'id' => 1,
                'title' => 'project 1'
            ],
            [
                'id' => 2,
                'title' => 'project 2'
            ],
            [
                'id' => 3,
                'title' => 'project 3'
            ],
            [
                'id' => 4,
                'title' => 'project 4'
            ],
            [
                'id' => 5,
                'title' => 'project 5'
            ],
            [
                'id' => 6,
                'title' => 'project 6'
            ],
            [
                'id' => 7,
                'title' => 'project 7'
            ],
            [
                'id' => 8,
                'title' => 'project 8'
            ],
            [
                'id' => 9,
                'title' => 'project 9'
            ],
            [
                'id' => 10,
                'title' => 'project 10'
            ],
            [
                'id' => 11,
                'title' => 'project 11'
            ],
            [
                'id' => 12,
                'title' => 'project 12'
            ],
            [
                'id' => 13,
                'title' => 'project 13'
            ],
            [
                'id' => 14,
                'title' => 'project 14'
            ],
            [
                'id' => 15,
                'title' => 'project 15'
            ],
        ]);
    }
}
