<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = Role::create(['name' => 'admin']);

        User::create([
            'name' => 'Ivan Perez Fragoso',
            'email' => 'gerencia@solproe.com',
            'password' => bcrypt('12345678')
        ])->assignRole('admin');


        User::factory(3)->create();
    }
}
