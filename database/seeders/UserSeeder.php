<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Maicol Carrillo',
            'email' => 'maicol@maicol.com',
            'password' => bcrypt('Clave.123'),
            'phone' => '3163000762',
            'email_verified_at' => now()
        ]);
    }
}
