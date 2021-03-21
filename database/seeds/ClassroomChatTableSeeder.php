<?php

use Illuminate\Database\Seeder;
use App\Models\ClassroomChat;

class ClassroomChatTableSeeder extends Seeder
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
                "user_id"=>1,
                "text"=>'次のテストっていつですか？',
            ],
            [
                "id"=>2,
                "lesson_id"=>1,
                "user_id"=>2,
                "text"=>'再来週だと思います！',
            ],
            [
                "id"=>3,
                "lesson_id"=>1,
                "user_id"=>1,
                "text"=>'ありがとうございます！！',
            ],
        ];

        foreach ($dataSet as $data) {
            ClassroomChat::create($data);
        }
    }
}
