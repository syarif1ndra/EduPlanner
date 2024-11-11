<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    public function run()
    {
        // Membuat data dummy untuk 10 tugas
        for ($i = 0; $i < 100; $i++) {
            DB::table('tasks')->insert([
                'title' => 'Tugas ' . Str::random(5),  // Judul tugas acak
                'description' => 'Deskripsi tugas ' . Str::random(10), // Deskripsi acak
                'deadline' => Carbon::now()->addDays(rand(1, 30))->format('Y-m-d H:i:s'), // Deadline acak dalam 1-30 hari dari sekarang
                'is_completed' => rand(0, 1), // Status selesai acak (0 atau 1)
                'user_id' => 1, // Menggunakan user_id 1 (pastikan ada user dengan ID 1)
            ]);
        }
    }
}
