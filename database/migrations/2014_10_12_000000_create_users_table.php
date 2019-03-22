<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('obj_id')->unsigned()->nullable();
            $table->string('login')->unique();
            $table->string('password');
            $table->string('short_name',50)->nullable();
            $table->string('first_name',50)->nullable();
            $table->string('last_name',50)->nullable();
            $table->string('partonymic',50)->nullable();
            $table->decimal('salary',5,2)->nullable();
            $table->decimal('salary_1',5,2)->nullable();
            $table->tinyInteger('is_work')->nullable();
            $table->string('email');
            $table->string('phone',50)->nullable();
            $table->integer('role_id')->unsigned()->nullable();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->string('image',60)->nullable();
            $table->text('comment')->nullable();
            $table->string('creator',50)->nullable();
            $table->string('last_modifer',50)->nullable();
            $table->softDeletes();
            $table->timestamp('login_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**references
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
