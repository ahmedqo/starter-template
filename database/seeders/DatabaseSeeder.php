<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        if (!User::where('email', 'admin@template.com')->orWhere('phone', '212999999991')->limit(1)->first()) {
            User::create([
                'first_name' => 'User',
                'last_name' => 'User',
                'email' => 'admin@template.com',
                'phone' => '212999999991',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
            ]);
        }
    }
}
