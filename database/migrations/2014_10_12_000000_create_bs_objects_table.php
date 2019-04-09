<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bs_objects', function (Blueprint $table) {
            $table->increments('id');
            //$table->string('type',10)->nullable();
            $table->string('name',50)->nullable();
            $table->string('name_rus',50)->nullable();
            $table->string('address',50)->nullable();
            $table->string('image',50)->nullable();
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
        Schema::dropIfExists('objects');
    }
}
