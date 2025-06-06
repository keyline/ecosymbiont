<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password       = Hash::make('123456');
        $adminRecords   = [
            'id'        => 1,
            'name'      => 'Master Admin',
            'type'      => 'MA',
            'mobile'    => '9876543210',
            'email'     => 'admin@gmail.com',
            'password'  => $password,
            'image'     => '',
            'status'    => 1,
        ];
        Admin::insert($adminRecords);
    }
}
