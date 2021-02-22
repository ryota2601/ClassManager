<?php

use Illuminate\Database\Seeder;
use App\Models\Lesson;

class LessonTableSeeder extends Seeder
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
            "university_id"=>1,
            "department_id"=>1,
            "user_id"=>1,
            "name"=>"農学概論",
            "start_time"=>'2020-01-01',
            'end_time'=>'2021-08-01',
            'day_id'=>1,
            'time_id'=>1
        ];

        Lesson::create($dataset);
    }
}
