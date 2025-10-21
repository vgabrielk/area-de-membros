<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = User::firstOrCreate([
            'name' => 'Vitor Felix',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        $user->assignRole('super-admin');


    }
}
