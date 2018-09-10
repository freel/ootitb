<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Profession;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_sa = Role::where('name', 'sa')->first();
        $profession_sa = Profession::where('name', 'sa')->first();

        $role_manager = Role::where('name', 'manager')->first();
        $profession_manager = Profession::where('name', 'Инженер ООТИБ')->first();

        $sa = new User();
        $sa->name = 'Администратор';
        $sa->email = 'admin@ootib.ru';
        $sa->password = bcrypt('password');
        $sa->save();
        $sa->roles()->attach($role_sa);
        $sa->profession()->associate($profession_sa);

        $manager = new User();
        $manager->name = 'Сизов Андрей Николаевич';
        $manager->email = 'manager@ootib.ru';
        $manager->password = bcrypt('password');
        $manager->save();
        $manager->roles()->attach($role_manager);
        $manager->profession()->associate($profession_manager);
    }
}
