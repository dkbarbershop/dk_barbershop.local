<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('object_id')->unsigned()->nullable();
            $table->foreign('object_id')->references('id')->on('objects');
            $table->string('short_name',50)->nullable();
            $table->string('first_name',50)->nullable();
            $table->string('last_name',50)->nullable();
            $table->string('partonymic',50)->nullable();
            $table->decimal('salary',5,2)->nullable();
            $table->decimal('salary_1',5,2)->nullable();
            $table->tinyInteger('is_work')->nullable();
            $table->string('phone',50)->nullable();
            $table->string('image',60)->nullable();
            $table->text('comment')->nullable();
            $table->string('creator',50)->nullable();
            $table->string('last_modifer',50)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('persons');
    }
}
