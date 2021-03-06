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
        $dataSet = [
            [
                "id"=>1,
                "lesson_id"=>1,
                "deadline"=>'2021-04-20',
                "task"=>'レポート1',
                "user_id"=>1,
            ],
            [
                "id"=>2,
                "lesson_id"=>1,
                "deadline"=>'2021-05-01',
                "task"=>'レポート2',
                "user_id"=>1,
            ],
            [
                "id"=>3,
                "lesson_id"=>1,
                "deadline"=>'2021-05-15',
                "task"=>'小テスト',
                "user_id"=>1,
            ],
            [
                "id"=>4,
                "lesson_id"=>2,
                "deadline"=>'2021-05-15',
                "task"=>'単語テスト',
                "user_id"=>1,
            ],
        ];

        foreach ($dataSet as $data) {
            Classroom::create($data);
        }
    }
}
