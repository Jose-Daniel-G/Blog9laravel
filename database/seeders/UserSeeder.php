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
        User::create([
            'name'=>'Jose Daniel Grijalba Osorio',
            'sexo'=> 'M',
            'telefono'=>'314852684',
            'email'=> 'jose.jdgo97@gmail.com',
            'email_verified_at' => now(),            
            'password'=> bcrypt('123123123'),
        ])->assignRole('Admin');
        User::create([
            'name'=>'Juan David Grijalba Osorio',
            'sexo'=> 'M',
            'telefono'=>'314852685',
            'email'=> 'juandavidgo1997@gmail.com',
            'email_verified_at' => now(),            
            'password'=> bcrypt('123123123'),
        ])->assignRole('Blogger');

        User::create([
            'name'=>'Hebron Teacher',
            'sexo'=> 'M',
            'telefono'=>'314852686',
            'email'=> 'hebron.customer@gmail.com',
            'email_verified_at' => now(),            
            'password'=> bcrypt('123123123'),
        ])->assignRole('Profesor');

        User::create([
            'name'=>'Mario',
            'sexo'=> 'M',
            'telefono'=>'314852567',
            'email'=> 'mario@gmail.com',
            'email_verified_at' => now(),            
            'password'=> bcrypt('123123123'),
        ])->assignRole('Alumno');

        User::create([
            'name'=>'Alejandro',
            'sexo'=> 'M',
            'telefono'=>'314852568',
            'email'=> 'alejo@gmail.com',
            'email_verified_at' => now(),            
            'password'=> bcrypt('123123123'),
        ])->assignRole('Alumno');
        User::factory(9)->create();
    }
}
