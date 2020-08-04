<?php

use Illuminate\Database\Seeder;

class Feedback_filterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feedback_filter')->insert([
					[
						'feedback_id' => 1,
						'filter_id' => 1
					],
					[
						'feedback_id' => 2,
						'filter_id' => 3
					],
					[
						'feedback_id' => 2,
						'filter_id' => 4
					],
					[
						'feedback_id' => 3,
						'filter_id' => 2
					],
					[
						'feedback_id' => 4,
						'filter_id' => 1
					],
					[
						'feedback_id' => 4,
						'filter_id' => 4
					],
					[
						'feedback_id' => 5,
						'filter_id' => 3
					],
					[
						'feedback_id' => 6,
						'filter_id' => 2
					],
					[
						'feedback_id' => 6,
						'filter_id' => 1
					],
					[
						'feedback_id' => 7,
						'filter_id' => 3
					],
					[
						'feedback_id' => 8,
						'filter_id' => 1
					],
					[
						'feedback_id' => 8,
						'filter_id' => 4
					],
				]);
    }
}
