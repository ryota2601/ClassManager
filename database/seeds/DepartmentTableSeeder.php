<?php

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentTableSeeder extends Seeder
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
            "name"=>"農学部",
        ];

        Department::create($dataset);

    }
}
