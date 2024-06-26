<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Pet;
use App\Models\Role;
use App\Models\Shelter;
use App\Models\User;
use App\Models\Task;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Creating 4 Roles
        Role::create(['RoleName' => 'Admin']);
        Role::create(['RoleName' => 'GoogleUser']);
        Role::create(['RoleName' => 'User']);
        Role::create(['RoleName' => 'Volunteer']);
        //Create 1 admin
        User::create([
            'name' => 'Juliana',
            'password' => Hash::make('Gomonuka7'),
            'role_id' => 1,
            'username' => 'Gomonuka',
            'secret_question' => 'What is your favorite film?',
            'secret_answer' => 'Dune',
        ]);
        //Create 20 regular users
        User::factory()->count(50)->create();
        //2 Pet Categories
        Category::create(['CategoryName' => 'Cats']);
        Category::create(['CategoryName' => 'Dogs']);
        //5 Shelters
        Shelter::create(['ShelterName' => 'North Haven']);
        Shelter::create(['ShelterName' => 'South Haven']);
        Shelter::create(['ShelterName' => 'West Haven']);
        Shelter::create(['ShelterName' => 'East Haven']);
        Shelter::create(['ShelterName' => 'North-West Haven']);
        //30 Pets created with a factory 
        Pet::factory()->count(30)->create();
        //30 Tasks
        Task::factory()->count(30)->create();
    }
}
