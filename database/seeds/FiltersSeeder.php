<?php

use Illuminate\Database\Seeder;

class FiltersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			DB::table('filters')->insert([
				[
					'name' => 'КОПИРАЙТИНГ',
					'class' => 'copywriting'
				],
				[
					'name' => 'НАСТРОЙКА РЕКЛАМЫ',
					'class' => 'advertising'
				],
				[
					'name' => 'ОФОРМЛЕНИЕ АККАУНТА',
					'class' => 'account'
				],
				[
					'name' => 'КОНСУЛЬТАЦИИ',
					'class' => 'consult'
				],
			]);
    }
}
