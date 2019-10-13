<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('role_id');
            $table->unsignedInteger('user_id');

            $table->timestamps();

            // Relaciones
            $table->foreign('role_id')->references('id')->on('roles')
                        ->onUpdate('cascade')
                        ->opDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                        ->opUpdate('cascade')
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
        Schema::dropIfExists('role_user');
    }
}