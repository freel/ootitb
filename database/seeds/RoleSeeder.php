<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_sa = new Role();
      $role_sa->name = 'sa';
      $role_sa->description = 'Администратор';
      $role_sa->save();

      $role_manager = new Role();
      $role_manager->name = 'manager';
      $role_manager->description = 'Менеджер';
      $role_manager->save();

      $role_employee = new Role();
      $role_employee->name = 'employee';
      $role_employee->description = 'Пользователь';
      $role_employee->save();
    }
}
