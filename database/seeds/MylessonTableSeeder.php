<?php

use Illuminate\Database\Seeder;
use App\Models\Mylesson;

class MylessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataSet =[
            [
                "id"=>1,
                "user_id"=>1,
                "lesson_id"=>1,
            ],
            [
                "id"=>2,
                "user_id"=>1,
                "lesson_id"=>2,
            ],
            [
                "id"=>3,
                "user_id"=>2,
                "lesson_id"=>1,
            ],
            [
                "id"=>4,
                "user_id"=>2,
                "lesson_id"=>2,
            ],
        ];

        foreach ($dataSet as $data) {
            Mylesson::create($data);
        }
    }
}
