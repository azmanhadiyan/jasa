<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name'=>'Adminku',
                'email'=>'admin@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('adminadmin')
            ],
            [
                'name'=>'Operator Jasa',
                'email'=>'operator_jasa@gmail.com',
                'role'=>'operator',
                'password'=>bcrypt('operator_jasa')
            ],
        ];
        foreach ($userData as $key => $value) {
            User::create($value);
        }
    }
}
