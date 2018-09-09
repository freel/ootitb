<?php

use Illuminate\Database\Seeder;

class TestGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('test_groups')->insert(
        [
          'title' => 'ПОМБЕЗОПАСНОСТЬ',
          'description_short' => 'Промышленная безопасность',
          'description' => null,
          'parent_id' => 0
        ]);
        DB::table('test_groups')->insert(
        [
          'title' => 'А.',
          'description_short' => 'Общие требования промышленной безопасности',
          'description' => null,
          'parent_id' => 1
        ]);
        DB::table('test_groups')->insert(
        [
          'title' => 'А.1',
          'description_short' => 'Основы промышленной безопасности',
          'description' => null,
          'parent_id' => 2
        ]);
        DB::table('test_groups')->insert(
        [
          'title' => 'Б.',
          'description_short' => 'Специальные требования промышленной безопасности',
          'description' => null,
          'parent_id' => 1
        ]);
        DB::table('test_groups')->insert(
        [
          'title' => 'Б1.',
          'description_short' => 'Требования промышленной безопасности в химической, нефтехимической и нефтеперерабатывающей промышленности',
          'description' => 'Раздел в редакции, введенной в действие с 25 января 2018 года приказом Ростехнадзора от 19 января 2018 года N 23.',
          'parent_id' => 4
        ]);
        DB::table('test_groups')->insert(
        [
          'title' => 'Б.1.1.',
          'description_short' => 'Эксплуатация химически опасных производственных объектов',
          'description' => null,
          'parent_id' => 5
        ]);
    }
}
