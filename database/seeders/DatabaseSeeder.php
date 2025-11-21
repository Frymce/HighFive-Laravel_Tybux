<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //1: La creation des roles
        $adminRole = Role::create(["name"=> "admin"]);
        $userRole = Role::create(['name' => 'user']);

        //2: Creation de l'administrateur
        $admin = User::factory()->create([
             'name' => 'Admin User',
             'email' => 'admin@hfive.com',
             'password' => bcrypt('password'),
        ]);
        $admin->assignRole($adminRole);//Attibution de role admin a l'administrateur

        //3: Creation d'un utilisateur
        $user = User::factory()->create([
             'name' => 'Alice Doe',
        'email' => 'alice@hfive.com',
        'password' => bcrypt('password'),
        ]);
        $user->assignRole($userRole);
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
