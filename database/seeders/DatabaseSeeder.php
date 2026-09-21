<?php

namespace Database\Seeders;

use App\Models\ExpenseCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'demo@jobudget.com'],
            [
                'name' => 'Demo User',
                'password' => Hash::make('password'),
            ]
        );

        ExpenseCategory::firstOrCreate([
            'user_id' => $user->id,
            'name' => 'Bills',
        ]);

        ExpenseCategory::firstOrCreate([
            'user_id' => $user->id,
            'name' => 'Rent',
        ]);

        ExpenseCategory::firstOrCreate([
            'user_id' => $user->id,
            'name' => 'Miscellaneous',
        ]);
    }
}