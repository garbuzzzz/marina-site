<?php

use Illuminate\Database\Seeder;

class FeedbacksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			DB::table('feedbacks')->insert([
				[
					'author' => 'ЛИДИЯ КРЕЗЗЗЗ',
					'position' => 'федерально-генеральный менеджер',
					'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis, repudiandae.',
					'text' => 'Круто, что все получилось, я рада нашему сотрудничеству!',
					'image_little' => 'img/gallery-img/gallery-photo-1.png',
					'image' => 'img/gallery-img/project-01.jpg'
				],
				[
					'author' => 'ЛИДИЯ asdf',
					'position' => 'федерально-генеральный менеджер',
					'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis, repudiandae.',
					'text' => 'Круто, что все получилось, я рада нашему сотрудничеству!',
					'image_little' => 'img/gallery-img/gallery-photo-1.png',
					'image' => 'img/gallery-img/project-01.jpg'
				],
				[
					'author' => 'ЛИДИЯ ter',
					'position' => 'федерально-генеральный менеджер',
					'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis, repudiandae.',
					'text' => 'Круто, что все получилось, я рада нашему сотрудничеству!',
					'image_little' => 'img/gallery-img/gallery-photo-1.png',
					'image' => 'img/gallery-img/project-01.jpg'
				],
				[
					'author' => 'ЛИДИЯ uioyuo',
					'position' => 'федерально-генеральный менеджер',
					'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis, repudiandae.',
					'text' => 'Круто, что все получилось, я рада нашему сотрудничеству!',
					'image_little' => 'img/gallery-img/gallery-photo-1.png',
					'image' => 'img/gallery-img/project-01.jpg'
				],
				[
					'author' => 'ЛИДИЯ tryurtyurt',
					'position' => 'федерально-генеральный менеджер',
					'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis, repudiandae.',
					'text' => 'Круто, что все получилось, я рада нашему сотрудничеству!',
					'image_little' => 'img/gallery-img/gallery-photo-1.png',
					'image' => 'img/gallery-img/project-01.jpg'
				],
				[
					'author' => 'ЛИДИЯ asfsdfsafvvv',
					'position' => 'федерально-генеральный менеджер',
					'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis, repudiandae.',
					'text' => 'Круто, что все получилось, я рада нашему сотрудничеству!',
					'image_little' => 'img/gallery-img/gallery-photo-1.png',
					'image' => 'img/gallery-img/project-01.jpg'
				],
				[
					'author' => 'ЛИДИЯ .gjk',
					'position' => 'федерально-генеральный менеджер',
					'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis, repudiandae.',
					'text' => 'Круто, что все получилось, я рада нашему сотрудничеству!',
					'image_little' => 'img/gallery-img/gallery-photo-1.png',
					'image' => 'img/gallery-img/project-01.jpg'
				],
				[
					'author' => 'ЛИДИЯ yiyuiyyu',
					'position' => 'федерально-генеральный менеджер',
					'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis, repudiandae.',
					'text' => 'Круто, что все получилось, я рада нашему сотрудничеству!',
					'image_little' => 'img/gallery-img/gallery-photo-1.png',
					'image' => 'img/gallery-img/project-01.jpg'
				],
			]);
	}
}

