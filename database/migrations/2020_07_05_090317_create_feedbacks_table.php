<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
			Schema::create('feedbacks', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('author', 100);
				$table->string('position', 100);
				$table->text('description', 100); // короткое описание при наведении мышкой
				$table->text('text'); // когда модальное окно уже открыто, там внизу есть текст
				$table->string('image_little', 200);
				$table->string('image', 200);
			});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedbacks');
    }
}
