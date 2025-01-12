<?php

namespace Database\Seeders;

use App\Models\Support;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Support::create([
            'subject' => 'Test Support',
            'message' => 'test message',
            'status' => 'open',
        ]);
    }
}