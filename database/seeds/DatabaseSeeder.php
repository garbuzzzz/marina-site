<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
		public function run()
		// composer dump-autoload, если не видит класс после команды запуска посева
    {
        $this->call(TitlesSeeder::class);
        $this->call(FeedbacksSeeder::class);
        $this->call(FiltersSeeder::class);
        $this->call(Feedback_filterSeeder::class);
    }
}
