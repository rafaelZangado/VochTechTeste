<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\EconomicGroup;
use \App\Models\Flag;
use \App\Models\Unit;
use \App\Models\Employee;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
        ]);


        EconomicGroup::factory(5)->create()->each(function ($economicGroup) {
            $economicGroup->flags()->saveMany(
                Flag::factory(3)->make()
            )->each(function ($flag) {

                $flag->units()->saveMany(
                    Unit::factory(2)->make()
                )->each(function ($unit) {

                    $unit->employees()->saveMany(
                        Employee::factory(5)->make()
                    );
                });
            });
        });
    }
}
