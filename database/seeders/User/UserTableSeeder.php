<?php

namespace Database\Seeders\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
        $superAdminRole = Role::where('name', 'super_admin')->first();
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        User::create([
            'fullname' => 'Nome Completo do Super Administrador',
            'nickname' => 'Apelido do Super Administrador',
            'email' => 'super@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'type' => 'CPF',
            'document' => '98765432109',
        ])->assignRole('super_admin');

        User::create([
            'fullname' => 'Nome Completo do Administrador',
            'nickname' => 'Apelido do Administrador',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'type' => 'CPF',
            'document' => '00393385732',
        ])->assignRole('admin');

        User::create([
            'fullname' => 'Nome Completo do Usuário',
            'nickname' => 'Apelido do Usuário',
            'email' => 'usuario@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('senha'),
            'type' => 'CPF',
            'document' => '12345678901',
        ])->assignRole('user');
    }
}
