<?php

use Illuminate\Database\Seeder;
use App\Models\University;

class UniversityTableSeeder extends Seeder
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
            "name"=>"明治大学",
        ];

        University::create($dataset);
    }
}
