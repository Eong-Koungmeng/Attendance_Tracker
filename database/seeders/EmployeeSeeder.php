<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            [
                'first_name' => 'Chet',
                'last_name' => 'Sovisoth',
                'phone' => '085217333',
                'shift_id' => 1,
                'position_id' => 1,
                'user_id' => 1,
            ],
            [
                'first_name' => 'Chean',
                'last_name' => 'Botum',
                'phone' => '085216333',
                'shift_id' => 1,
                'position_id' => 2,
                'user_id' => 2,
            ]
        ];

        foreach ($employees as $employeeData) {
            Employee::create($employeeData);
        }
    }
}
