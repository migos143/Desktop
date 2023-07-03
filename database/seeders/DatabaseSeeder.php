<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Student;
use App\Models\Grade;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();
        $students = Student::all();
        
        foreach ($users as $user) {
            Student::factory()->create([
                'user_id' => $user->id
            ]);
        }

        foreach ($students as $student) {
            grade::factory()->create([
                'student_id' => $student->id
            ]);
        }
        
    }
}
