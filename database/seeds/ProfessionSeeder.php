<?php

use Illuminate\Database\Seeder;
use App\Profession;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profession_asup = new Profession();
        $profession_asup->name = 'sa';
        $profession_asup->description = 'Администратор';
        $profession_asup->save();

        $profession_ooitb = new Profession();
        $profession_ooitb->name = 'Инженер ООТИБ';
        $profession_ooitb->description = '1 категории';
        $profession_ooitb->save();
    }
}
