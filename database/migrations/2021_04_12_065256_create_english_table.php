<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnglishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('english', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('addition_id')->nullable();
            $table->string('english',20);
            $table->string('transcription',20)->nullable();
            $table->string('past_simp',20)->nullable();
            $table->string('transcription2',20)->nullable();
            $table->string('past_part',20)->nullable();
            $table->string('transcription3',20)->nullable();
            $table->string('meaning4',20)->nullable();
            $table->string('transcription4',20)->nullable();
            $table->string('mark_except',10)->nullable();
            $table->text('еxplanation')->nullable();
            $table->string('lesson_num')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('english');
    }
}
