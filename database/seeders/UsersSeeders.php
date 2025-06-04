<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'firstName' => 'testenome2',
            'lastName' => 'sobrenome',
            'email'=> 'exemplo@ex.com',
            'password'=> bcrypt('12345678'),
        ]);
    }
}
