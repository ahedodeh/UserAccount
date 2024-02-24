<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     
        User::factory()
            ->count(7)
            ->hasAccounts(3)
            ->create(); 
        User::factory()
            ->count(5)
            ->hasAccounts(1)
            ->create();        
        
       
    }
}
