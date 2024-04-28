<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('secret'),
            'municipality' => 'admin',
            'municipal_director' => 'admin',
            'status' => 'Active',
            'role' => '1',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Irosin',
            'username' => 'IrosinMPS',
            'password' => Hash::make('Irosin123'),
            'municipality' => 'Irosin',
            'municipal_director' => 'Irosin',
            'status' => 'Active',
            'role' => '2',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'James Bond',
            'username' => 'James-Bond',
            'password' => Hash::make('James123'),
            'municipality' => 'Irosin',
            'municipal_director' => 'Gen. Luna',
            'status' => 'Active',
            'role' => '3',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Crime Lab',
            'username' => 'PNP_CrimeLab',
            'password' => Hash::make('CrimeLab123'),
            'municipality' => 'admin',
            'municipal_director' => 'admin',
            'status' => 'Active',
            'role' => '4',
        ]);
    }
}
