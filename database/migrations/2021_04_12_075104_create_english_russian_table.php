<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnglishRussianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('english_russian', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('english_id');
            $table->unsignedInteger('russian_id');
            $table->timestamps();

            $table->foreign('english_id')
                ->references('id')
                ->on('english')
                ->onDelete('cascade');

            $table->foreign('russian_id')
                ->references('id')
                ->on('russian')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('english_russian');
    }
}
