<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $managerRole = Role::where('name', 'manager')->first();
        $employeeRole = Role::where('name', 'employee')->first();


        $manager = User::create([
            'first_name' => 'Manager',
            'last_name' => 'User',
            'address' => 'no 1234',
            'phone_number' => '01234567890',
            'email' => 'manager@manager.com',
            "password" => Hash::make("password"),
        ]);

        $employee = User::create([
            'first_name' => 'Employee',
            'last_name' => 'User',
            'address' => 'no 1234',
            'phone_number' => '01234567890',
            'email' => 'employee@employee.com',
            "password" => Hash::make("password"),
        ]);

        $manager->roles()->attach($managerRole);
        $employee->roles()->attach($employeeRole);
    }
}
