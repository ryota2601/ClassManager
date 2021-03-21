<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
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
                "name"=>"松本僚太",
                "university_id"=>1,
                "department_id"=>1,
                "email"=>'t1@t.com',
                "password"=>bcrypt('00000000'),
            ],
            [
                "id"=>2,
                "name"=>"田中太郎",
                "university_id"=>1,
                "department_id"=>1,
                "email"=>'t2@t.com',
                "password"=>bcrypt('00000000'),
            ],
        ];

        foreach ($dataSet as $data) {
            User::create($data);
        }
    }
}
