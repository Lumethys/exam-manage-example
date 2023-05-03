<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use App\Models\Exam;
use App\Models\School;
use App\Models\InviteCode;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $school1 = School::create([
            'name' => 'Trường đại học Bách Khoa'
        ]);

        School::create([
            'name' => 'Trường đại học Khoa học tự nhiên'
        ]);

        $exam = Exam::create([
            'start_date' => Carbon::parse('2023/02/01'),
            'start_date' => Carbon::parse('2023/06/01'),
            'year' => '2023',
        ]);

        InviteCode::factory()
            ->count(10)
            ->for($school1)
            ->for($exam)
            ->create();
    }
}
