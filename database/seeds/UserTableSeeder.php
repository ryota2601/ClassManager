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
            "email"=>'test@test.com',
            "password"=>'testtest',
        ];

        User::create($dataset);
    }
}
