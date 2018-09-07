<?php

use Illuminate\Database\Seeder;

class CertificationAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('certification_areas')->insert(
        [
          'title' => 'А.',
          'text' => 'Общие требования промышленной безопасности',
          'description' => null,
          'parent_id' => 0
        ]);
        DB::table('certification_areas')->insert(
        [
          'title' => 'А.1',
          'text' => 'Основы промышленной безопасности',
          'description' => null,
          'parent_id' => 1
        ]);
        DB::table('certification_areas')->insert(
        [
          'title' => 'Б.',
          'text' => 'Специальные требования промышленной безопасности',
          'description' => null,
          'parent_id' => 0
        ]);
        DB::table('certification_areas')->insert(
        [
          'title' => 'Б1.',
          'text' => 'Требования промышленной безопасности в химической, нефтехимической и нефтеперерабатывающей промышленности',
          'description' => 'Раздел в редакции, введенной в действие с 25 января 2018 года приказом Ростехнадзора от 19 января 2018 года N 23.',
          'parent_id' => 3
        ]);
        DB::table('certification_areas')->insert(
        [
          'title' => 'Б.1.1.',
          'text' => 'Эксплуатация химически опасных производственных объектов',
          'description' => null,
          'parent_id' => 4
        ]);


    }
}
