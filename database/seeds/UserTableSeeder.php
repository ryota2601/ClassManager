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
        $dataset =[
            "id"=>1,
            "name"=>"松本僚太",
            "university_id"=>1,
            "department_id"=>1,
            "email"=>'t@t.com',
            "password"=>bcrypt('00000000'),
        ];

        User::create($dataset);
    }
}
