<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */ 
    public function run()
    {
        $this->call(UniversityTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(LessonTableSeeder::class);
        $this->call(ClassroomTableSeeder::class);
        $this->call(ClassroomChatTableSeeder::class);
        $this->call(MylessonTableSeeder::class);
    }
}
