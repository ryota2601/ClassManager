<?php

use Illuminate\Database\Seeder;
use App\Models\Classroom;


class ClassroomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataset =[
            "id"=>1,
            "lesson_id"=>1,
            "deadline"=>'04-20',
            "task"=>'レポート',
        ];

        Classroom::create($dataset);
    }
}
